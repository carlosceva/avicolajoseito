@extends('adminlte::page')

@section('title', 'Promotores')

@section('content_header')
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            <p class="mb-0">{{session('status')}}</p>
        </div>
    @endif
    <div class="float-right d-sm-block">
            <a href="{{url('promotores/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
    </div>
    <h1>Gestionar Promotores</h1>
@stop

@section('content')
    <div class="card table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
            <tr>
                <th class="d-none d-md-table-cell">Id</th>
                <th class="d-none d-md-table-cell">Nombre</th>
                <th>Correo</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($promotores as $pro)
                <tr>
                    <td class="d-none d-md-table-cell">{{ $pro->id }}</td>
                    <td class="d-none d-md-table-cell">{{$pro->name}}</td>
                    <td>{{$pro->email}}</td>
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
