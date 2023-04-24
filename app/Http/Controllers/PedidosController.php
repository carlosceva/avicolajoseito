<?php

namespace App\Http\Controllers;


use App\Models\Detalle;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotor=Auth::id();
        $pedidos = DB::table('pedidos as p')
            ->join('clientes as c','p.idcliente','=','c.idcliente')
            ->join('mercados as m','m.idmercado','=','c.idmercado')
            ->select('p.idpedido','p.idcliente','p.idpromotor','p.created_at as hora','c.nombrecliente','m.nombremercado','p.observacion')
            ->where('p.idpromotor','=',$promotor)
            ->orderBy('p.idpedido','desc')
            ->get();
        $detalles = DB::table('detallepedidos as d')
            ->join('productos as pr','pr.idproducto','=','d.idproducto')
            ->join('pedidos as pe','pe.idpedido','=','d.idpedido')
            ->select('d.idpedido','pr.nombreproducto','d.cantidad')
            ->get();

        return view('Pedidos.index',['pedidos'=>$pedidos,'detalles'=>$detalles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotor=Auth::id();
        $clientes =  DB::table('clientes as c')
            ->select('c.idcliente','c.nombrecliente','c.codcliente')
            ->where('c.idpromotor','=',$promotor)
            ->where('c.estado','=','a')
            ->orderBy('c.nombrecliente','asc')
            ->get();
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

        try {
            DB::beginTransaction();
            $promotor=Auth::id();

            $pedido = New Pedido();
            $pedido->idcliente=(int)$request->input('cliente');
            $pedido->idpromotor=$promotor;
            $pedido->observacion=$request->input('observacion');
            $pedido->save();

            $idproducto=$request->get('idproducto');
            $cantidad=$request->get('cantidad');
            $size = count((array)$idproducto);

            $cont = 0;
            while($cont<$size){
                $detalle=new Detalle();
                $detalle->idpedido=$pedido->idpedido;
                $detalle->idproducto=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->descripcion='';
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch (\Exception $e){
            //dd($e);
        }

        session()->flash('status','Registro guardado exitosamente!!');

        return Redirect::to('pedidos');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
