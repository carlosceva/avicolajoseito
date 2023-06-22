@extends('adminlte::page')

@section('title', 'Gestionar Hora')

@section('content_header')

<strong><h1>Gestionar hora</h1></strong>
<div class="card-body">
    <p>Establece la hora en la cual se podran registrar pedidos</p>
    <form method="POST" action="{{ route('hora.update', $hora->id) }}">
        @csrf
        @method('PUT')
        <div class="input-group mb-3 col-6">
            <span class="input-group-text " id="basic-addon3">Hora inicio</span>
            <input type="text" class="form-control" id="horainicio" name="horainicio" aria-describedby="basic-addon3">
        </div>

        <div class="input-group mb-3 col-6 ">
            <span class="input-group-text " id="basic-addon3">Hora fin</span>
            <input type="text" class="form-control" id="horafin" name="horafin" aria-describedby="basic-addon3">
        </div>
        <button type="submit" class="btn btn-success ">Actualizar</button>
        <a href="{{route('hora.index')}}" class="btn btn-danger ">Cancelar</a>
    </form>
</div>

<div class="card-body">
    <label for="">Actualmente el sistema tiene la siguiente configuracion:</label>
    <p>La hora para registrar pedidos inicia a las <strong>{{$hora->horainicio}}</strong> y finaliza a las <strong>{{$hora->horafin}}</strong></p>
</div>
@stop

@section('css')

@stop

@section('js')
    
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop