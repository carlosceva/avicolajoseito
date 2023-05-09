@extends('adminlte::page')

@section('title', 'Mis ventas')

@section('content_header')
    <div class="row justify-content-start">
        <div class="col-3">
            <h1>Mis ventas</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row card">
        <table class="table table-hover">
            <thead class="table-light">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($productos as $pro)
                <tr>
                    <td>{{ $pro->nombreproducto }}</td>
                    <td>{{$pro->cant}}</td>
                </tr>
            @endforeach
                <tr>
                    <td><b>Total</b></td>
                    <td><b>{{$total->cant}}</b></td>
                </tr>
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
