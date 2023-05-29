@extends('adminlte::page')

@section('title', 'Mis ventas')

@section('content_header')
    <div class="row">    
        <h1>Dashboard</h1>
    </div>
@stop

@section('content')
    
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data['pedidosDia']}}</h3>
                    <p>Pedidos del día</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$data['clientesActivos']}}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$data['clientesBloqueados']}}</h3>
                    <p>Bloqueados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$top}}</h3>
                    <p>Producto TOP</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        
        <!-- <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                     Contenido de la tarjeta
                </div>
            </div>
        </div>-->
    </div>

    
    
    
    <style>
        #myChart {
            width: 100%;
            height: auto;
        }
    </style>
@stop

@section('css')

@stop

@section('js')
<script type="module">import chartJs from 'https://cdn.jsdelivr.net/npm/chart.js@4.3.0/+esm'</script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

    <script>
        $(document).ready(function(){
            var nombres = {!! json_encode($producto) !!};
            var cantidades = {!! json_encode($cantidad) !!};
            // var datosInvertidos = nombres.map(function(nombre, index) {
            //     return {
            //         y: nombre,
            //         x: cantidades[index]
            //     };
            // });
            const ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombres,
                    datasets:[{
                        label:'Productos vendidos del dia',
                        data: cantidades,
                        backgroundColor:[
                            '#F95A1E',
                            '#F9A31E',
                            '#F9DE1E',
                            '#E2F91E',
                            '#C4F91E',
                            '#1EF999',
                            '#1EF9D8',
                            '#1EF6F9',
                            '#1ED1F9',
                            '#1E9FF9',
                            '#601EF9',
                            '#991EF9',
                            '#C41EF9',
                            '#F91E85',
                            '#F91E1E',
                        ],
                        borderWidth: 0,
                        
                    }]
                },
                options: {
                    indexAxis: 'x',
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                }
            });

            // Ajustar el tamaño del gráfico al contenedor
            function resizeChart() {
                var container = document.getElementById('myChart').parentNode;
                var canvas = document.getElementById('myChart');
                canvas.width = container.offsetWidth;
                canvas.height = container.offsetHeight;
                myChart.resize();
            }

            // Ajustar el tamaño del gráfico cuando se redimensiona la ventana
            window.addEventListener('resize', resizeChart);
            resizeChart(); // Ajustar el tamaño inicial del gráfico
        });
    </script>
    


@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop
