<?php

namespace App\Http\Controllers;


use App\Models\Detalle;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $promotor = Auth::user()->id;
        $fechaActual = Carbon::now()->format('Y-m-d');

        $now = Carbon::now();
        $horaInicio = Carbon::createFromTime(8, 00, 0); // Establecer hora de inicio a las 8:00 AM
        $horaFin = Carbon::createFromTime(18, 00, 0); // Establecer hora de fin a las 18:00 PM
        $puedeAgregarPedido = $now->between($horaInicio, $horaFin);

        // Obtener los pedidos del mismo día
        $fechaPedidos = Pedido::whereDate('created_at', $fechaActual)->get();
        
        if(Auth::user()->rol == 'promotor'){
        $pedidos = DB::table('pedidos as p')
            ->join('clientes as c','p.idcliente','=','c.idcliente')
            ->join('mercados as m','m.idmercado','=','c.idmercado')
            ->select('p.idpedido','p.idcliente','p.iduser','p.created_at as hora','c.nombrecliente','m.nombremercado','p.observacion')
            ->where('p.iduser','=',$promotor)
            ->where('p.estado','a')
            ->whereDate('p.created_at', $fechaActual)
            ->orderBy('p.idpedido','desc')
            ->get();
        $detalles = DB::table('detallepedidos as d')
            ->join('productos as pr','pr.idproducto','=','d.idproducto')
            ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
            ->select('d.iddetalle','d.idpedido','pr.nombreproducto','d.cantidad','d.descripcion')
            ->where('d.estado','a')
            ->get();
        }
        if(Auth::user()->rol == 'auxiliar' || Auth::user()->rol == 'administrador'){
            $pedidos = DB::table('pedidos as p')
            ->join('clientes as c','p.idcliente','=','c.idcliente')
            ->join('mercados as m','m.idmercado','=','c.idmercado')
            ->join('users as u','u.id','=','p.iduser')
            ->where('p.estado','a')
            ->whereDate('p.created_at', $fechaActual)
            ->select('p.idpedido','p.idcliente','p.iduser','p.created_at as hora','c.nombrecliente','m.nombremercado','p.observacion','u.name')
            ->orderBy('p.idpedido','desc')
            ->get();
        $detalles = DB::table('detallepedidos as d')
            ->join('productos as pr','pr.idproducto','=','d.idproducto')
            ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
            ->select('d.iddetalle','d.idpedido','pr.nombreproducto','d.cantidad','d.descripcion')
            ->where('d.estado','a')
            ->get();
        }

        return view('Pedidos.index',['pedidos'=>$pedidos,'detalles'=>$detalles,'puedeAgregarPedido'=>$puedeAgregarPedido]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotor = Auth::user()->id;
        if(Auth::user()->rol == 'promotor'){
            $clientes =  DB::table('clientes as c')
                ->select('c.idcliente','c.nombrecliente','c.codcliente')
                ->where('c.iduser','=',$promotor)
                ->where('c.estado','=','a')
                ->orderBy('c.nombrecliente','asc')
                ->get();
        }
        if(Auth::user()->rol == 'auxiliar' || Auth::user()->rol == 'administrador'){
            $clientes =  DB::table('clientes as c')
                ->select('c.idcliente','c.nombrecliente','c.codcliente')
                ->where('c.estado','=','a')
                ->orderBy('c.nombrecliente','asc')
                ->get();
        }
        $productos = DB::table('productos as p')
            ->select('p.idproducto','p.nombreproducto')
            ->orderBy('p.nombreproducto','asc')
            ->get();
        return view('Pedidos.create',['clientes'=>$clientes,'productos'=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente'=>'required',
        ]);
        
        $now = Carbon::now();
        $horaInicio = Carbon::createFromTime(8, 0, 0); // Establecer hora de inicio a las 8:00 AM
        $horaFin = Carbon::createFromTime(18, 0, 0); // Establecer hora de fin a las 18:00 PM
        
        if ($now->between($horaInicio, $horaFin) || Auth::user()->rol == 'administrador' || Auth::user()->rol == 'auxiliar') {
            
            try {
                DB::beginTransaction();
                $promotor = Auth::user()->id;
            
                $pedido = New Pedido();
                $pedido->idcliente=(int)$request->input('cliente');
                $pedido->iduser=$promotor;
                $pedido->estado = 'a';
                $pedido->observacion=$request->input('observacion');
                $pedido->save();

                $idproducto=$request->get('idproducto');
                $cantidad=$request->get('cantidad');
                $descripcion=$request->get('descripcion');
                $size = count((array)$idproducto);

                $cont = 0;
                while($cont<$size){
                    $detalle=new Detalle();
                    $detalle->idpedido=$pedido->idpedido;
                    $detalle->idproducto=$idproducto[$cont];
                    $detalle->cantidad=$cantidad[$cont];
                    $detalle->descripcion=$descripcion[$cont] ?:'';
                    $detalle->estado='a';
                    $detalle->save();
                    $cont=$cont+1;
                }
                DB::commit();
                session()->flash('status','Registro guardado exitosamente!!');
            }catch (\Exception $e){
                //dd($e);
            }

            return Redirect::to('mispedidos');
        } else {
            //session()->flash('status','No se puede agregar un pedido en este momentosky.');
            return Redirect::to('mispedidos')->with('error', 'No se puede agregar un pedido en este momento.');
        }
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'cliente'=>'required',
        ]);

        $now = Carbon::now();
        $horaInicio = Carbon::createFromTime(8, 0, 0); // Establecer hora de inicio a las 8:00 AM
        $horaFin = Carbon::createFromTime(18, 0, 0); // Establecer hora de fin a las 18:00 PM

        if ($now->between($horaInicio, $horaFin) || Auth::user()->rol == 'administrador' || Auth::user()->rol == 'auxiliar') {
            try {
                DB::beginTransaction();
                $promotor = Auth::user()->id;
            
                $pedido = New Pedido();
                $pedido->idcliente=(int)$request->input('cliente');
                $pedido->iduser=$promotor;
                $pedido->estado = 'a';
                $pedido->observacion=$request->input('observacion');
                $pedido->save();

                $idproducto=$request->get('idproducto');
                $cantidad=$request->get('cantidad');
                $descripcion=$request->get('descripcion');

                $filtrarproductos = array_filter($cantidad, function($valor) {
                    return $valor !== null && $valor > 0;
                });
                $posiciones = array_keys($filtrarproductos);
                $valores = array_values($filtrarproductos);

                $size = count((array)$posiciones);
                $cont = 0;
                while($cont<$size){
                    $detalle=new Detalle();
                    $detalle->idpedido=$pedido->idpedido;
                    $detalle->idproducto=$idproducto[$posiciones[$cont]];
                    $detalle->cantidad=$cantidad[$posiciones[$cont]];
                    $detalle->descripcion=$descripcion[$posiciones[$cont]] ?:'';
                    $detalle->estado='a';
                    $detalle->save();
                    $cont=$cont+1;
                }
                DB::commit();
                session()->flash('status','Registro guardado exitosamente!!');
            }catch (\Exception $e){
                //dd($e);
            }

            return Redirect::to('mispedidos');
        } else {
            //session()->flash('status','No se puede agregar un pedido en este momentosky.');
            return Redirect::to('mispedidos')->with('error', 'No se puede agregar un pedido en este momento.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {   
        $id = $pedido->idpedido;
        $observacion = $pedido->observacion;

        $detallePedido = DB::table('detallepedidos as det')
        ->join('productos as prod','prod.idproducto','=','det.idproducto')
        ->select('det.idpedido','det.iddetalle','det.idproducto','prod.nombreproducto','det.cantidad','det.descripcion','det.estado')
        ->where('idpedido','=',$pedido->idpedido)
        ->whereNot('det.estado','i')
        ->get();

        $productos = DB::table('productos as p')
            ->select('p.idproducto','p.nombreproducto')
            ->orderBy('p.nombreproducto','asc')
            ->get();

        return view('Pedidos.editar',compact('detallePedido','productos','id','observacion'));
    }

    // public function editar(Pedido $pedido)
    // {   
    //     dd($pedido->idpedido);
    //     return view('Pedidos.editar');
    // }

    public function detalle(Detalle $detalle)
    {   
        $detalle = DB::table('detallepedidos as det')
        ->join('productos as pro','pro.idproducto','=','det.idproducto')
        ->select('det.iddetalle','det.idproducto','pro.nombreproducto','det.cantidad','det.descripcion')
        ->where('det.iddetalle','=',$detalle->iddetalle)
        ->first();
        return view('Pedidos.detalle',compact('detalle'));
    }

    public function eliminar($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->estado = 'i';
        $pedido->save();

        return redirect()->back()->with('success', 'Pedido eliminado correctamente');
    }

    public function eliminarDetalle($id)
    {
        $detalle = Detalle::findOrFail($id);
        $detalle->estado = 'i'; // Cambiar el estado a "i" (inactivo) u otro valor que represente la eliminación lógica
        $detalle->save();

        return response()->json(['success' => true]);
    }

    public function quitarDetalle($id)
    {
        $detalle = Detalle::findOrFail($id);
        $detalle->estado = 'i'; // Cambiar el estado a "i" (inactivo) u otro valor que represente la eliminación lógica
        $detalle->save();

        return redirect()->back()->with('success', 'Pedido eliminado correctamente');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detalle $detalle)
    {
        if(Auth::user()->rol == 'promotor'){
            $validator = Validator::make($request->all(), [
                'cantidad' => [
                    'required',
                    'numeric',
                    function ($attribute, $value, $fail) use ($request) {
                        if ($value <= $request->input('cantidad_actual')) {
                            $fail('La cantidad que desea introducir es menor al valor actual.');
                        }
                    },
                ],
                // Otras reglas de validación para los demás atributos...
            ]);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        $detallepedido = Detalle::findOrFail($detalle->iddetalle);

        $data = $request->only('cantidad','descripcion');

        $detallepedido->update($data);
        return Redirect::to('mispedidos');
    }

    public function actualizar(Request $request, $id)
    {
        $idpedido = $id;
        $observacion = $request->observacion;
        
        try {
            DB::beginTransaction();
            $idproducto=$request->get('idproducto');
            $cantidad=$request->get('cantidad');
            $descripcion=$request->get('descripcion');
            $size = count((array)$idproducto);
            
            $cont = 0;
            while($cont<$size){
                $detalle=new Detalle();
                $detalle->idpedido=$idpedido;
                $detalle->idproducto=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->descripcion=$descripcion[$cont] ?:'';
                $detalle->estado='a';
                $detalle->save();
                $cont=$cont+1;
            }

            $pedido = Pedido::findOrFail($idpedido);
            $pedido->observacion = $observacion;
            $pedido->save();

            DB::commit();
            session()->flash('status','Registro guardado exitosamente!!');
        }catch (\Exception $e){
            //dd($e);
        }

        return Redirect::to('mispedidos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function agregar()
    {
        $promotor = Auth::user()->id;
        if(Auth::user()->rol == 'promotor'){
            $clientes =  DB::table('clientes as c')
                ->select('c.idcliente','c.nombrecliente','c.codcliente')
                ->where('c.iduser','=',$promotor)
                ->where('c.estado','=','a')
                ->orderBy('c.nombrecliente','asc')
                ->get();
        }
        if(Auth::user()->rol == 'auxiliar' || Auth::user()->rol == 'administrador'){
            $clientes =  DB::table('clientes as c')
                ->select('c.idcliente','c.nombrecliente','c.codcliente')
                ->where('c.estado','=','a')
                ->orderBy('c.nombrecliente','asc')
                ->get();
        }
        $productos = DB::table('productos as p')
            ->select('p.idproducto','p.nombreproducto')
            ->orderBy('p.idproducto','asc')
            ->get();
        return view('Pedidos.agregar',['clientes'=>$clientes,'productos'=>$productos]);
    }

    public function ventas()
    {
        $promotor = Auth::user()->id;
        $fechaActual = Carbon::now()->format('Y-m-d');

        // Obtener los pedidos del mismo día
        $fechaPedidos = Pedido::whereDate('created_at', $fechaActual)->get();

        if(Auth::user()->rol == 'promotor'){
            $productos = DB::table('detallepedidos as d')
                ->join('productos as pr','pr.idproducto','=','d.idproducto')
                ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
                ->select('pr.nombreproducto as producto', DB::raw('sum(d.cantidad) as cant'))
                ->where('pe.iduser','=',$promotor)
                ->where('pe.estado','a')
                ->where('d.estado','a')
                ->whereDate('pe.created_at', $fechaActual)
                ->groupBy('pr.nombreproducto')
                ->orderBy('pr.nombreproducto')
                ->get();

            $data = [
                'pedidosDia' => $pedidosDia = Pedido::where('iduser','=',$promotor)
                    ->whereDate('created_at', $fechaActual)->where('estado','a')->count(),
                'clientesActivos' =>$clientesActivos = Cliente::where('estado', 'a')
                    ->where('iduser','=',$promotor)->count(),
                'clientesBloqueados' => $clientesBloqueados = Cliente::where('estado', 'i')
                ->where('iduser','=',$promotor)->count(),
                'productoTop' => $productoTop = DB::table('detallepedidos as d')
                    ->join('productos as pr','pr.idproducto','=','d.idproducto')
                    ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
                    ->select('pr.nombreproducto as producto', DB::raw('sum(d.cantidad) as cant'))
                    ->where('pe.iduser','=',$promotor)
                    ->where('pe.estado','a')
                    ->where('d.estado','a')
                    ->whereDate('pe.created_at', $fechaActual)
                    ->groupBy('pr.nombreproducto')
                    ->orderByDesc('cant')
                    ->first()
            ];

        }
        if(Auth::user()->rol == 'auxiliar' || Auth::user()->rol == 'administrador'){
            $productos = DB::table('detallepedidos as d')
                ->join('productos as pr','pr.idproducto','=','d.idproducto')
                ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
                ->select('pr.nombreproducto as producto', DB::raw('sum(d.cantidad) as cant'))
                ->where('pe.estado','a')
                ->where('d.estado','a')
                ->whereDate('pe.created_at', $fechaActual)
                ->groupBy('pr.nombreproducto')
                ->orderBy('pr.nombreproducto')
                ->get();
        
            $data = [
                'pedidosDia' => $pedidosDia = Pedido::whereDate('created_at', $fechaActual)->where('estado','a')->count(),
                'clientesActivos' =>$clientesActivos = Cliente::where('estado', 'a')->count(),
                'clientesBloqueados' => $clientesBloqueados = Cliente::where('estado', 'i')->count(),
                'productoTop' => $productoTop = DB::table('detallepedidos as d')
                    ->join('productos as pr','pr.idproducto','=','d.idproducto')
                    ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
                    ->select('pr.nombreproducto as producto', DB::raw('sum(d.cantidad) as cant'))
                    ->where('pe.estado','a')
                    ->where('d.estado','a')
                    ->whereDate('pe.created_at', $fechaActual)
                    ->orderByDesc('cant')
                    ->first()
            ];
        }

        if ($data['productoTop'] !== null) {
            $array = json_decode(json_encode($data), true);
            $product = $array['productoTop']['producto'];
        }else{
            $product = 'Ninguno';
        }
               

        $total = DB::table('detallepedidos as d')
            ->join('productos as pr','pr.idproducto','=','d.idproducto')
            ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
            ->select(DB::raw('sum(d.cantidad) as cant'))
            ->where('pe.iduser','=',$promotor)
            ->first();

        $producto = $productos->pluck('producto');
        $cantidad = $productos->pluck('cant');

        return view('Pedidos.ventas',['productos'=>$productos,'total'=>$total,'producto'=>$producto,'cantidad'=>$cantidad,'data'=>$data,'top'=>$product]);
    }
}
