<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Promotor;
use App\Models\Mercado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\datatables;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $promotor = Auth::user()->id;

        $clientes =  DB::table('clientes as c')
            ->select('c.idcliente', 'c.nombrecliente', 'c.codcliente')
            ->join('mercados as m', 'm.idmercado', '=', 'c.idmercado')
            ->where('c.iduser', '=', $promotor)
            ->select('c.idcliente', 'c.codcliente', 'c.nombrecliente', 'm.nombremercado as mercado', 'c.celular', 'c.estado')
            ->orderBy('c.estado', 'desc')
            ->orderBy('c.idcliente', 'asc')
            ->get();

        return view('Clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotores = DB::table('users')
            ->where('rol', '=', 'promotor')
            ->orderBy('name', 'asc')
            ->get();

        $mercados = Mercado::orderBy('nombremercado', 'asc')->get();
        return view('Clientes.create', ['promotores' => $promotores, 'mercados' => $mercados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'promotor' => 'required',
            'mercado' => 'required',
            'codcliente' => 'required',
            'nombrecliente' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $cliente = new Cliente();
            $cliente->nombrecliente = $request->input('nombrecliente');
            $cliente->codcliente = $request->input('codcliente');
            $cliente->celular = $request->input('celular');
            $cliente->puesto = $request->input('puesto');
            $cliente->iduser = $request->input('promotor');
            $cliente->idmercado = $request->input('mercado');
            $cliente->observaciones = $request->input('observaciones');
            $cliente->estado = 'a';
            $cliente->save();

            DB::commit();
            session()->flash('status', 'Registro guardado exitosamente!!');
        } catch (\Exception $e) {
            dd($e);
        }

        return Redirect::to('clientes');
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

    public function todosLosClientes(Request $request)
    {

        if ($request->ajax()) {
            $clientes = DB::table('clientes as c')
                ->join('mercados as m', 'm.idmercado', '=', 'c.idmercado')
                ->join('users as u', 'c.iduser', '=', 'u.id')
                ->select('c.idcliente', 'c.codcliente', 'c.nombrecliente', 'm.nombremercado', 'c.estado', 'u.name')
                ->orderBy('c.estado', 'desc')
                ->orderBy('c.idcliente', 'asc')
                ->get();

            return datatables()
                ->of($clientes)
                ->addColumn('accion', function ($cliente) {
                    return view('Clientes.accion', compact('cliente'));
                })
                ->toJson();
        }

        return view('Clientes.clientes');
    }
}
