<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BloquearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Clientes.bloquear');
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
        $datos = $request->codigoclientes;
        $codigo = explode(",",$datos);
        $numero = count($codigo) - 1;
        for ($i=0 ; $i<$numero ; $i++){
            DB::table('clientes')->where('codcliente','=',$codigo[$i])->update(['estado'=>'i']);
        };

        session()->flash('status','Se bloquearon '.$numero. ' clientes.');
        return Redirect::to('bloquear');
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
