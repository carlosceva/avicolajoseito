@extends('adminlte::page')

@section('title', 'Clientes bloqueados')

@section('content_header')
    <div class="row justify-content-start">
        <div class="col-3">
            <h1>Clientes bloqueados</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row card">
        <table class="table table-hover">
            <thead class="table-light">
            <tr>
                <th>Id</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Mercado</th>
                <th>Celular</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($bloqueados as $b)
                <tr>
                    <td>{{ $b->idcliente }}</td>
                    <td>{{$b->codcliente}}</td>
                    <td>{{$b->nombrecliente}}</td>
                    <td>{{$b->mercado}}</td>
                    <td>{{$b->celular}}</td>
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
    <script> console.log('Hi!'); </script>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop
