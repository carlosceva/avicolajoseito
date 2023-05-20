@extends('adminlte::page')

@section('title', 'Mis clientes')

@section('content_header')
<div class="float-right d-sm-block">
            <a href="{{url('clientes/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
    </div>
    <h1>Todos los clientes</h1>
@stop

@section('content')
    <div class="row card table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
            <tr>
                <th>Id</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th class="d-none d-md-table-cell">Mercado</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($clientes as $b)
                <tr <?php if ($b->estado ==="i") { echo 'style="background-color: red; color:white;"'; } ?>>
                    <td>{{ $b->idcliente }}</td>
                    <td>{{$b->codcliente}}</td>
                    <td>{{$b->nombrecliente}}</td>
                    <td class="d-none d-md-table-cell">{{$b->mercado}}</td>
                    <td>
                        @if($b->estado =="a")
                            activo
                        @else
                            inactivo
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop