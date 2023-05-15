<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotor=Auth::id();
        $bloqueados =  DB::table('clientes as c')
            ->select('c.idcliente','c.nombrecliente','c.codcliente')
            ->join('mercados as m','m.idmercado','=','c.idmercado')
            ->where('c.idpromotor','=',$promotor)
            ->where('c.estado','=','i')
            ->select('c.idcliente','c.codcliente','c.nombrecliente','m.nombremercado as mercado','c.celular','c.estado')
            ->orderBy('c.nombrecliente','asc')
            ->get();
        return view('Clientes.bloqueados',['bloqueados'=>$bloqueados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
