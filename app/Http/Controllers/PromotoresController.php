<?php

namespace App\Http\Controllers;

use App\Models\Promotor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class PromotoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotores = DB::table('users')
            ->select('id','name','email')
            ->get();
        return view('Promotores.index',['promotores'=>$promotores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Promotores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombrepromotor'=>'required',
            'correo'=>'required',
        ]);

        try {
            DB::beginTransaction();
            $Usuario = New User();
            $Usuario->name=$request->input('nombrepromotor');
            $Usuario->email=$request->input('correo');
            $Usuario->rol='promotor';
            //$Usuario->password=Hash::make($request->input('123456789'));
            $Usuario->password=Hash::make($request->input('password'));
            $Usuario->save();

            //$Usuario->assignRole('promotor');

            DB::commit();
            session()->flash('status','Registro guardado exitosamente!!');
        }catch (\Exception $e){
            dd($e);
        }

        return Redirect::to('promotores');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotor $promotor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotor $promotor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotor $promotor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotor $promotor)
    {
        //
    }
}
