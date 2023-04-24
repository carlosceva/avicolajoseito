@extends('adminlte::page')

@section('title', 'Mis pedidos')

@section('content_header')
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            <p class="mb-0">{{session('status')}}</p>
        </div>
    @endif
    <div class="row justify-content-start">
        <div class="col-3">
            <h1>Mis pedidos</h1>
        </div>
        <div class="col-3">
            <a href="{{url('pedidos/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
        </div>
    </div>
@stop

@section('content')
    <main>
    <div class="row">
        @foreach($pedidos as $pe)
        <div class="col-sm-4">
            <div class="card" >
                <div class="card-body row">
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <h5 class="card-title">#{{ $pe->idpedido }}</h5>
                                <p class="card-text"><small class="text-body-secondary col-4">{{ date('H:i',strtotime($pe->hora)) }}</small></p>
                            </div>
                            <label class="card-text">{{$pe->nombrecliente}}</label>
                            <p class="card-text">{{$pe->nombremercado}}</p>
                            <p class="card-text">Obs.: {{$pe->observacion}}</p>
                            <div class="row justify-content-between">
                                <p class="card-text"><small class="text-body-secondary col-4">{{ date('d/m/Y',strtotime($pe->hora)) }}</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 border">
                        <ul class="list-group list-group-flush">
                                @foreach($detalles as $det)
                                    @if($det->idpedido == $pe->idpedido)
                                        <li class="list-group-item bg-gray-light">{{$det->nombreproducto}} &nbsp; {{$det->cantidad}}</li>
                                    @endif
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </main>
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
