@extends('adminlte::page')

@section('title', 'Registrar Promotor')

@section('content_header')
    <div class="row">
        <div class="col-md-3"><h1>Registrar Cliente</h1></div>
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
            <form action="{{route('client.store')}}" method="post">
                @csrf

                <!-- Fila cliente, codigo cliente y celular -->
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="nombrecliente">Nombre cliente</label>
                        <input type="text" name="nombrecliente" id="nombrecliente" class="form-control" placeholder="Ingresar cliente" value="{{old('nombrecliente')}}">
                    </div>
                    <div class="col-md-4">
                            <label for="codcliente" class="form-label">Código cliente</label>
                        <input type="text" name="codcliente" id="codcliente" class="form-control" placeholder="Ingresar codigo" value="{{old('codcliente')}}">
                    </div>
                    <div class="col-md-4">
                        <label for="celular">Celular</label>
                        <input type="text" name="celular" id="celular" class="form-control" placeholder="Ingresar celular" value="{{old('celular')}}" >
                    </div>
                </div>

                <!-- Fila nro puesto, promotor y mercado -->
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="puesto" class="form-label">Nro puesto</label>
                        <input type="text" name="puesto" id="puesto" class="form-control" placeholder="Ingresar Nro Puesto" value="{{old('puesto')}}" required>
                    </div>
                    <div class="col-md-4">
                            <label for="promotor">Promotor</label>
                            <select name="promotor" id="promotor" class="form-control select2" required>
                            <option value="">Seleccionar promotor</option>
                            @foreach($promotores as $pro)    
                                <option value="{{$pro->id}}">{{$pro->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                            <label for="mercado">Mercado</label>
                            <select name="mercado" id="mercado" class="form-control select2" required>
                            <option value="">Seleccionar mercado</option>
                            @foreach($mercados as $mer)
                                <option value="{{$mer->idmercado}}">{{$mer->nombremercado}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Fila observacion -->
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="observaciones">Observacion</label>
                        <input type="text" name="observaciones" id="observaciones" class="form-control" placeholder="Ingresar observaciones" value="{{old('observaciones')}}">
                    </div>
                </div>

                <br>
                <!-- Fila Botones Guardar y cancelar -->
                <div class="w3-row text-center" id="">
                    <button type="submit" id="register" class="btn btn-success col-md-3">Guardar</button>
                    <a href="{{route('client.all')}}" class="btn btn-danger col-md-3">Cancelar</a>
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
