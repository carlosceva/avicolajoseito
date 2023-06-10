@extends('adminlte::page')

@section('title', 'Registrar Pedido')

@section('content_header')
    <div class="row">
        <div class="col-md-3"><h1>Registrar pedido</h1></div>
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
            <form action="{{route('pedidos.guardar')}}" method="post">
                @csrf

                <!-- Fila Cliente y codigo cliente                                    onchange="cambioOpciones();" -->
                <div class="form-group row">
                    <div class="col-md-12">
                            <select name="cliente" id="cliente" class="form-control select2"  required>
                            <option value="">Seleccionar Cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{$cliente->idcliente}}">{{$cliente->codcliente}} - {{$cliente->nombrecliente}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Fila producto, cantidad y boton agregar -->
                @php
                    $productosArray = $productos->toArray();
                    $gruposProductos = array_chunk($productosArray, 11);
                @endphp

                <div id="carousel-example" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        @foreach ($gruposProductos as $index => $grupo)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <ul class="list-group color-{{$index}}">
                            @foreach ($grupo as $producto)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="">{{ $producto->nombreproducto }}</label>
                                        </div>
                                        <div class="col-3">
                                            <input type="hidden" name="idproducto[]" id="" value="{{ $producto->idproducto }}">
                                            <input type="number" name="cantidad[]" min="0" id="" class="form-control" placeholder="Cantidad" value="">
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="descripcion[]" id="" class="form-control" placeholder="Descripción" value="">
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

                <label class="col-md-1">&nbsp;</label>
                <!-- Fila Tabla detalles -->
                
                <!-- Fila observacion -->
                <div class="form-group">
                    <input type="text"  name="observacion" id="observacion" class="form-control" placeholder="Observación" value="" >
                </div>

                <!-- Fila Botones Guardar y cancelar -->
                <div class="w3-row text-center" id="guardar">
                        <button type="submit" id="register" class="btn btn-success col-md-3">Guardar Pedido</button>
                        <label class="col-md-1">&nbsp;</label>
                        <a href="{{url('mispedidos')}}" class="btn btn-danger col-md-3">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <meta name="google" content="notranslate">
    
    <style>
        ul.list-group.color-0 {
            border: 2px solid #FF6100; /* Establece un borde de 1px sólido con color #ccc */
            border-radius: 5px; /* Agrega esquinas redondeadas al borde */
            padding: 0px; /* Espacio interno para separar los elementos */
        }

        ul.list-group.color-1 {
            border: 2px solid #FFF300; /* Establece un borde de 1px sólido con color #ccc */
            border-radius: 5px; /* Agrega esquinas redondeadas al borde */
            padding: 0px; /* Espacio interno para separar los elementos */
        }

        ul.list-group.color-2 {
            border: 2px solid #8FEB4C; /* Establece un borde de 1px sólido con color #ccc */
            border-radius: 5px; /* Agrega esquinas redondeadas al borde */
            padding: 0px; /* Espacio interno para separar los elementos */
        }

        ul.list-group.color-3 {
            border: 2px solid #00B2FF; /* Establece un borde de 1px sólido con color #ccc */
            border-radius: 5px; /* Agrega esquinas redondeadas al borde */
            padding: 0px; /* Espacio interno para separar los elementos */
        }

        ul.list-group.color-4 {
            border: 2px solid #F44DFF; /* Establece un borde de 1px sólido con color #ccc */
            border-radius: 5px; /* Agrega esquinas redondeadas al borde */
            padding: 0px; /* Espacio interno para separar los elementos */
        }
    </style>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        var carousel = document.getElementById('carousel-example');
        var carouselInner = carousel.querySelector('.carousel-inner');
        var carouselItems = carouselInner.querySelectorAll('.carousel-item');

        var startX = 0;
        var endX = 0;

        carousel.addEventListener('mousedown', function (event) {
            startX = event.clientX;
        });

        carousel.addEventListener('mouseup', function (event) {
            endX = event.clientX;
            handleSwipe();
        });

        carousel.addEventListener('touchstart', function (event) {
            startX = event.touches[0].clientX;
        });

        carousel.addEventListener('touchend', function (event) {
            endX = event.changedTouches[0].clientX;
            handleSwipe();
        });

        function handleSwipe() {
            var activeItem = carouselInner.querySelector('.carousel-item.active');
            var activeIndex = Array.prototype.indexOf.call(carouselItems, activeItem);

            if (startX - endX > 100 && activeIndex < carouselItems.length - 1) {
                carouselItems[activeIndex].classList.remove('active');
                carouselItems[activeIndex + 1].classList.add('active');
            } else if (endX - startX > 100 && activeIndex > 0) {
                carouselItems[activeIndex].classList.remove('active');
                carouselItems[activeIndex - 1].classList.add('active');
            }
        }

    </script>
    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                $('button[type="submit"]').prop('disabled', true);
            });
        });

    </script>
@stop

@section('footer')
        <div class="float-right d-sm-block">
            <b>Version</b> 1.1
        </div>
        <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop