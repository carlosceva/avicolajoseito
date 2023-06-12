@extends('adminlte::page')

@section('title', 'Planilla Industrial')

@section('content_header')

<strong><h1>Informe de ventas</h1></strong>
<div class="card-body">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Productos/Promotores</th>
                @foreach ($promotores as $promotor)
                    <th>{{ $promotor }}</th>
                @endforeach
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td><b>{{ $producto }}</b></td>
                    @foreach ($promotores as $promotor)
                        <td>
                        @if (($informe[$promotor][$producto] ?? 0) > 0)
                            <strong style="color:BLUE;">{{ $informe[$promotor][$producto] ?? 0 }}</strong>
                        @else
                            <span style="color:gray">0</span>
                        @endif
                            
                        </td>
                    @endforeach
                    <td style="background-color: orange;"> <b>
                        {{ $totalesProductos[$producto] ?? 0 }}
                    </b></td>
                </tr>
            @endforeach
        </tbody>
    </table>
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