@extends('adminlte::page')

@section('title', 'Mis pedidos')

@section('content_header')
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            <p class="mb-0">{{session('status')}}</p>
        </div>
    @endif
    @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    <div class="float-right d-sm-block"> <!-- {{ $puedeAgregarPedido ? '' : 'disabled' }} -->
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
        <a href="{{url('mispedidos/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Agregar(1)</a>
            <a href="{{url('mispedidos/agregar')}}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Agregar(2)</a>
        @endif
        @if (auth()->user()->rol == 'promotor')
            <a href="{{url('mispedidos/create')}}" class="btn btn-primary {{ $puedeAgregarPedido ? '' : 'disabled' }}"><i class="fa fa-plus"></i>&nbsp; Agregar(1)</a>
            <a href="{{url('mispedidos/agregar')}}" class="btn btn-success {{ $puedeAgregarPedido ? '' : 'disabled' }}"><i class="fa fa-plus"></i>&nbsp; Agregar(2)</a>
        @endif
        </div>
    </div>
    <h1>Mis pedidos</h1>
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
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">#{{ $pe->idpedido }} &nbsp; 
                                    @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
                                    <a href="{{ route('pedidos.edit',$pe->idpedido)}}"> <i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#confirmarEliminar{{ $pe->idpedido }}"> <i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>
                                    @endif
                                </h5> 
                                <p class="card-text"><small class="text-body-secondary col-4">{{ date('H:i',strtotime($pe->hora)) }}</small></p>
                            </div>
                            <label class="card-text">{{$pe->nombrecliente}}</label>
                            <p class="card-text">{{$pe->nombremercado}}</p>
                            @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
                                <label>{{$pe->name}}</label>
                            @endif
                            @if (!empty($pe->observacion))
                                <p class="card-text">Obs.: {{$pe->observacion}}</p>
                            @endif
                            <div class="d-flex justify-content-between">
                                <p class="card-text"><small class="text-body-secondary col-4">{{ date('d/m/Y',strtotime($pe->hora)) }}</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 border">
                        <ul class="list-group list-group-flush">
                                @foreach($detalles as $det)
                                    @if($det->idpedido == $pe->idpedido)
                                        <li class="list-group-item bg-gray-light small">{{$det->nombreproducto}} &nbsp; 
                                        <b> {{$det->cantidad}} </b>
                                        &nbsp;
                                        @if (auth()->user()->rol == 'administrador' || auth()->user()->rol == 'auxiliar')
                                            <a href="{{ route('pedidos.detalle',$det->iddetalle)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#EliminarDetalle{{ $det->iddetalle }}"> <i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>
                                        @endif
                                        @if (auth()->user()->rol == 'promotor' && $puedeAgregarPedido)
                                            <a href="{{ route('pedidos.detalle',$det->iddetalle)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                        </li>
                                    @endif
                                    <!-- Modal de confirmación de eliminación de detalle  -->
                                    <div class="modal fade" id="EliminarDetalle{{ $det->iddetalle }}" tabindex="-1" role="dialog" aria-labelledby="confirmarEliminarLabel{{ $det->iddetalle }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmarEliminarLabel{{ $det->iddetalle }}">Confirmar eliminación</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro de que deseas eliminar el producto?</p>
                                                    <p>{{$det->nombreproducto}}, cantidad: {{$det->cantidad}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="{{ route('pedidos.quitarDetalle', $det->iddetalle) }}" class="btn btn-danger">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal de confirmación de eliminación-->
        <div class="modal fade" id="confirmarEliminar{{ $pe->idpedido }}" tabindex="-1" role="dialog" aria-labelledby="confirmarEliminarLabel{{ $pe->idpedido }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmarEliminarLabel{{ $pe->idpedido }}">Confirmar eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar el pedido #{{ $pe->idpedido }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a href="{{ route('pedidos.eliminar', $pe->idpedido) }}" class="btn btn-danger">Eliminar</a>
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
        <div class="float-right d-sm-block">
            <b>Version</b> 1.1
        </div>
        <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop
