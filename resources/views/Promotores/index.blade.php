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
        <div class="card-body">
        <table class="table table-hover" id="promotores">
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#promotores').DataTable();
    </script>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop
