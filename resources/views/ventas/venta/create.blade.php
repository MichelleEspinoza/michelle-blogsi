@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="text-secondary">Nuevo Venta</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
            {{Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))}}
            @csrf
            <div class="row text-dark">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="cliente">Cliente</label>
                        <select class="form-select" name="idcliente" id="idcliente">
                            @foreach ($personas as $persona)
                            <option value="{{$persona->id}}">{{$persona->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="direccion" >Comprobante</label>
                        <select class="form-select" name="tipo_comprobante">
                            <option value="Boleta">Boleta</option>
                            <option value="Factura">Factura</option>
                            <option value="Ticket">Ticket</option>
                        </select>    
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="serie_comprobante">Serie Comprobante</label>
                        <input class="form-control" type="text" name="serie_comprobante"  value="{{old('serie_comprobante')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="num_comprobante">Número de Comprobante</label>
                        <input class="form-control" type="text" name="num_comprobante"  value="{{old('num_comprobante')}}">
                    </div>
                </div>
            </div>
            <div class="row text-dark">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="" class="form-label">Articulo</label>
                                <select class="form-select" name="pidarticulo" id="pidarticulo">
                                    @foreach($articulos as $articulo)
                                    <option data-tokens="" value="{{$articulo->id}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">
                                        {{$articulo->articulo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="cantidad">Cantidad</label>
                        <input class="form-control" type="number" name="pcantidad" id="pcantidad">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="descuento">Stock</label>
                        <input class="form-control" type="number" name="pstock" id="pstock" disabled>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="precio_venta">Precio venta</label>
                        <input class="form-control" type="number" name="pprecio_venta" id="pprecio_venta" disabled>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="descuento">Descuento</label>
                        <input class="form-control" type="number" name="pdescuento" id="pdescuento">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-hovertable-striped table-bordered table-condensed">
                        <thead class="table-primary">
                            <th>Opciones</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precion Venta</th>
                            <th>Descuento</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <h4 id="ptotal">$ 0.00</h4><input type="hidden" name="total_venta" id="total_venta">
                            </th>
                        </tfoot>
                        <tbody >

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                    <div class="form-group">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>
            

			{{Form::close()}}		
            
		</div>
	</div>
    @push('scripts')
        <script>
            $(document).ready(function(){
                $('#bt_add').click(function(){
                    agregar();
                });
            });
            var cont=0;
            total=0;
            subtotal=[];
            $("#guardar").hide();
            $("#pidarticulo").change(mostrarValores);
           // console.log("test");

            function mostrarValores(){
                datosArticulo=document.getElementById('pidarticulo').value.split('_');
                $("#pprecio_venta").val(datosArticulo[2]);
                $("#pstock").val(datosArticulo[1]);
              //  console.log(datosArticulo);
            }
            function agregar(){
                datosArticulo=document.getElementById('pidarticulo').value.split('_');
                idarticulo=datosArticulo[0];
                articulo=$('#pidarticulo option:selected').text();
                cantidad=+$('#pcantidad').val();

                descuento=$('#pdescuento').val();
                precio_venta=$('#pprecio_venta').val();
                stock=+$('#pstock').val();
                

                if(idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="" ){
                    if(stock>=cantidad){
                    subtotal[cont]=(cantidad*precio_venta-descuento);
                    total=total+subtotal[cont];
                   // console.log(total);
                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td><td><input type="number" name="descuento[]" value="'+descuento+'">'+descuento+'</td><td><input type="number" name="subtotal[]" value="'+subtotal+'">'+subtotal[cont]+'</td></tr>';
                    cont++;
                    limpiar();
                    +$('#ptotal').html("$ " + total);
                    +$('#total_venta').val(total);
                   // console.log(total);
                    evaluar();
                    $('#detalles').append(fila);
                    }
                    else{
                       // console.log(cantidad+'-'+stock);
                        alert("La cantidad a vender supera el stock");
                    }
                }
                else{
                    alert("Error al ingresar el detalle del la venta, revise los datos del articulo");
                }
            }
            function limpiar(){
                $('#pcantidad').val("");
                $('#pdescuento').val("");
                $('#pprecio_venta').val("");
            }
            function evaluar(){
                if(total>0){
                    $("#guardar").show();
                }
                else{
                    $("#guardar").hide();
                }
            }
            function eliminar(index){
                total=total-subtotal[index];
                $("#ptotal").html("$ " + total);
                $("#total_venta").val(total);
                $("#fila" + index).remove();
                evaluar();
            }
        </script>
    @endpush
@endsection