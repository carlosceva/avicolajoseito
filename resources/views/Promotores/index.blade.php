@extends('adminlte::page')

@section('title', 'Promotores')

@section('content_header')
    <div class="row justify-content-start">
        <div class="col-3">
            <h1>Gestionar Promotores</h1>
        </div>
        <div class="col-3">
            <a href="{{url('promotores/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
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
                <th>Celular</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($promotores as $pro)
                <tr>
                    <td>{{ $pro->idpromotor }}</td>
                    <td>{{$pro->codpromotor}}</td>
                    <td>{{$pro->nombrepromotor}}</td>
                    <td>{{$pro->celular}}</td>
                    <td>{{$pro->correo}}</td>
                    <td>{{$pro->direccion}}</td>
                    <td>
                        <a href=""><i class="fa fa-edit" aria-hidden="true"></i></a>
                        &nbsp;
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop

@section('css')

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
