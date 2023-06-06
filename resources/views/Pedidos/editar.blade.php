@extends('adminlte::page')

@section('title', 'Registrar Pedido')

@section('content_header')
    <div class="row">
        <div class="col-md-3"><h1>Editar Pedido #{{$id}}</h1> </div>
    </div>
@stop

@section('content')
            
                <div class="table-responsive">
                    <table id="detalle-table" class="table table-bordered table-striped table-light">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detallePedido as $detalle)
                                <tr id="detalle-{{ $detalle->iddetalle }}" <?php if ($detalle->estado ==="i") { echo 'style="background-color: red; color:white;"'; } ?>>
                                    <td>{{ $detalle->nombreproducto }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>{{ $detalle->descripcion }}</td>
                                    <td>
                                        <button type="button" class="eliminar-detalle btn btn-warning" data-detalle-id="{{ $detalle->iddetalle }}">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            <div class="card table-responsive">
                <div class="card-body">
                <div><h3>Adicionar Productos</h3></div>
                <form action="{{route('pedidos.actualizar',$id)}}" method="post">
                    @csrf
                    <!-- Fila producto, cantidad y boton agregar -->
                    <div class="form-group row">
                        <div class="form-group col-md-3">
                            <!-- <label for="idproducto"> Producto</label> -->
                            <select id="idproducto" name="idproducto" class="form-control" data-live-search="true" >
                                <option value="">Seleccione Producto</option>
                                @foreach($productos as $prod)
                                    <option value="{{$prod->idproducto}}">{{$prod->nombreproducto}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                        <!-- <label for="cantidad"> Cantidad</label> -->
                            <input type="number" name="cantidad" id="cantidad" min="0" class="form-control" placeholder="Cantidad" value="{{old('cantidad')}}" >
                        </div>

                        <div class="form-group col-md-3">
                            <!--  <label for="descripcion"> Descripcion</label> -->
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" value="{{old('cantidad')}}" >
                        </div>

                        <div class="form-group col-md-3">
                            <!-- <label for="">&nbsp;</label> -->
                            <button type="button" id="agregar" class="btn btn-primary col-md-12"> <i class="fa fa-shopping-cart"></i>&nbsp; Agregar detalle</button>
                        </div>
                    </div>

                    <!-- Fila Tabla detalles -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="detalles" class="table table-bordered table-striped table-light">
                                <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cant.</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    &nbsp;
                    <!-- Fila observacion -->
                    <div class="form-group">
                        <!-- <label for="observacion"> Observación</label> -->
                        <input type="text"  name="observacion" id="observacion" class="form-control" placeholder="Observación" value="{{$observacion}}" >
                    </div>

                    <!-- Fila Botones Guardar y cancelar -->
                    <div class="w3-row text-center" id="guardar">
                            <button type="submit" id="register" class="btn btn-success col-md-3">Guardar Pedido</button>
                            <label class="col-md-1">&nbsp;</label>
                            <a href="{{url('mispedidos')}}" class="btn btn-danger col-md-3">Cancelar</a>
                    </div>
                </form>
                </div>
            </div>
@stop

@section('css')
    
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Código JavaScript para eliminar un detalle de pedido utilizando Ajax

    $(document).on('click', '.eliminar-detalle', function() {
            var detalleId = $(this).data('detalle-id');
            var url = "{{ route('pedidos.eliminarDetalle', ':id') }}".replace(':id', detalleId);

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Eliminar la fila de la tabla
                    $('#detalle-' + detalleId).remove();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
</script>
<script>
        $(document).ready(function (){
            $('#agregar').click(function (){
                agregar();
            });
        })

        var cont=0;
        subtotal=[];
        total=0;
        //$('#guardar').hide();
        const btncompra = document.getElementById('register');
        btncompra.disabled = true;

        function agregar() {
            idproducto=$("#idproducto").val();
            producto=$("#idproducto option:selected").text();
            cantidad=$("#cantidad").val();
            descripcion = $("#descripcion").val();
            console.log(cantidad);
            if(idproducto && cantidad){
                subtotal[cont]=(cantidad);
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila'+ cont+'"><td><input type="hidden" name="idproducto[]" value="'+idproducto+'"><input class="form-control-plaintext" type="text" name="" value="'+producto+'"></td><td><input class="form-control-plaintext" type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input class="form-control-plaintext" type="text" name="descripcion[]" value="'+descripcion+'"></td><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td></tr>';
                cont++;
                limpiar();
                evaluar();
                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar");
            }
        }

        function limpiar(){
            $('#idproducto').val('').trigger('change');
            $('#cantidad').val('');
            $('#descripcion').val('');
            $('#idproducto').focus();
        }

        function evaluar(){
            if(total>0){
                const btncompra = document.getElementById('register');
                btncompra.disabled = false;
                //$("#guardar").show();
            }else{
                const btncompra = document.getElementById('register');
                btncompra.disabled = true;
                //$("#guardar").hide();
            }
        }

        function eliminar(index){
            total=total-subtotal[index];
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@stop

@section('footer')
    <div class="float-right d-sm-block">
        <b>Version</b> 1.1
    </div>
    <strong>Copyright © 2023 <a href="">cevasoft</a>.</strong> All rights reserved.
@stop