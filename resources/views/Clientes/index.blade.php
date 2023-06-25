@extends('adminlte::page')

@section('title', 'Mis clientes')

@section('content_header')

    <h1>Mis clientes</h1>
@stop

@section('content')
    <div class="row card table-responsive">
        <div class="card-body">
            <table class="table table-hover" id="clientes">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
                            <th>Accion</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($clientes as $b)
                        <tr <?php if ($b->estado === 'i') {
                            echo 'style="background-color: red; color:white;"';
                        } ?>>
                            <td>{{ $b->idcliente }}</td>
                            <td>{{ $b->codcliente }}</td>
                            <td>{{ $b->nombrecliente }}</td>

                            <td>
                                @if ($b->estado == 'a')
                                    activo
                                @else
                                    inactivo
                                @endif
                            </td>
                            @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
                                <td class="text-center">
                                    <div class="form-check form-switch">
                                        <form method="POST" action="{{ route('bloquear.update', $b->idcliente) }}">
                                            @method('PATCH')
                                            @csrf
                                            <input class="form-check-input" type="checkbox" name="estado"
                                                onchange="this.form.submit()" {{ $b->estado == 'i' ? '' : 'checked' }}>
                                        </form>
                                    </div>
                                </td>
                            @endif
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
        $('#clientes').DataTable();
    </script>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop
