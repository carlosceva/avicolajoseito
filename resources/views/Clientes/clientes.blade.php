@extends('adminlte::page')

@section('title', 'Mis clientes')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
@stop

@section('content_header')
    @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
        <div class="float-right d-sm-block">
            <a href="{{ url('clientes/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
        </div>
    @endif
    <h1>Todos mis clientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="usuarios" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Mercado</th>
                        <th>Promotor</th>
                        <th>Estado</th>
                        @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
                            <th>Accion</th>
                        @endif
                    </tr>
                </thead>

            </table>
        </div>
    </div>

@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax: '{{ route('client.all') }}',
                columns: [{
                        data: 'idcliente'
                    },
                    {
                        data: 'codcliente'
                    },
                    {
                        data: 'nombrecliente'
                    },
                    {
                        data: 'nombremercado'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'estado',
                        render: function(data, type, row) {
                            return (data === 'a') ? 'activo' : 'inactivo';
                        }
                    },
                    {
                        data: 'estado',
                        render: function(data, type, row) {
                            return '<div class="form-check form-switch">' +
                                '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"' +
                                (data === 'a' ? ' checked' : '') +
                                '></div>';
                        }
                    }
                ]
            });
        });
    </script>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop
