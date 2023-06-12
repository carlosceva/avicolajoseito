<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class PlanillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fechaActual = Carbon::now()->format('Y-m-d');

        $promotores = DB::table('users')
            ->where('estado','a')
            ->pluck('name')
            ->unique()
            ->values()
            ->all();
        
        $productos = DB::table('productos')
            ->orderBy('idproducto', 'asc')
            ->pluck('nombreproducto')
            ->all();
            

        $reporte = DB::table('detallepedidos as d')
            ->join('pedidos as p','p.idpedido','d.idpedido')
            ->join('productos as pr','pr.idproducto','d.idproducto')
            ->join('users as u','u.id','p.iduser')
            ->where('u.estado','a')
            ->where('p.estado','a')
            ->where('d.estado','a')
            ->whereDate('p.created_at', $fechaActual)
            ->select('u.name', 'pr.nombreproducto', DB::raw('sum(d.cantidad) as total'))
            ->groupBy('u.name', 'pr.nombreproducto')
            ->get();

        $informe = [];
        $totalesProductos = [];

        foreach ($reporte as $venta) {
            $promotor = $venta->name;
            $producto = $venta->nombreproducto;
            $total = $venta->total;

            if (!isset($informe[$promotor])) {
                $informe[$promotor] = [];
            }

            $informe[$promotor][$producto] = $total;

            if (!isset($totalesProductos[$producto])) {
                $totalesProductos[$producto] = 0;
            }

            $totalesProductos[$producto] += $total;
        }

        return view('Reportes.planilla',['informe' =>$informe, 'promotores'=>$promotores,'productos'=>$productos,'totalesProductos'=>$totalesProductos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
