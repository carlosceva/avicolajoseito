@extends('adminlte::page')

@section('title', 'Registrar Promotor')

@section('content_header')
    <div class="row">
        <div class="col-md-3"><h1>Registrar Promotor</h1></div>
    </div>
@stop

@section('content')
    <main>
        <div class="container py-4">
            @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{url('promotores')}}" method="post">
                @csrf

                <!-- Fila Promotor y codigo promotor -->
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="nombrepromotor">Nombre Promotor</label>
                        <input type="text" name="nombrepromotor" id="nombrepromotor" class="form-control" placeholder="Ingresar promotor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="correo" class="form-label">Correo electronico</label>
                        <input type="text" name="correo" id="correo" class="form-control" placeholder="Ingresar correo electronico" required>
                    </div>
                </div>

                <!-- Fila Direccion -->
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input type="password"  name="password" id="password" class="form-control" placeholder="Ingresar password" required>
                </div>

                <!-- Fila Botones Guardar y cancelar -->
                <div class="w3-row text-center" id="">
                    <button type="submit" id="register" class="btn btn-success col-md-3">Guardar</button>
                    <a href="{{url('promotores')}}" class="btn btn-danger col-md-3">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop

@section('footer')

    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.

@stop
