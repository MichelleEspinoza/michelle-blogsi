@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
            {{Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))}}
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="proveedor" class="form-label">Proveedor</label>
                        <select class="form-select" name="idproveedor" id="idproveedor">
                            @foreach ($personas as $persona)
                            <option value="{{$persona->id}}">{{$persona->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="direccion" class="form-label">Comprobante</label>
                        <select class="form-select" name="tipo_comprobante">
                            <option value="Boleta">Boleta</option>
                            <option value="Factura">Factura</option>
                            <option value="Ticket">Ticket</option>
                        </select>    
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="serie_comprobante" class="form-label">Serie Comprobante</label>
                        <input type="text" class="form-control" name="serie_comprobante"  value="{{old('serie_comprobante')}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="num_comprobante" class="form-label">Número de Comprobante</label>
                        <input type="text" class="form-control" name="num_comprobante"  value="{{old('num_comprobante')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="" class="form-label">Articulo</label>
                                <select class="form-select" name="pidarticulo" id="pidarticulo">
                                    @foreach($articulos as $articulo)
                                    <option data-tokens="" value="{{$articulo->id}}">{{$articulo->articulo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="pcantidad" id="pcantidad">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_compra" class="form-label">Precio compra</label>
                        <input type="number" class="form-control" name="pprecio_compra" id="pprecio_compra">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_venta" class="form-label">Precio venta</label>
                        <input type="number" class="form-control" name="pprecio_venta" id="pprecio_venta">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table class="table table-hovertable-striped table-bordered table-condensed">
                        <thead class="table-primary">
                            <th>Opciones</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precion compra</th>
                            <th>Precio Venta</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">$ 0.00</h4></th>
                        </tfoot>
                        <tbody id="detalles">

                        </tbody>
                    </table>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
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

            function agregar(){
                idarticulo=$('#pidarticulo').val();
                articulo=$('#pidarticulo option:selected').text();
                cantidad=$('#pcantidad').val();
                precio_compra=$('#pprecio_compra').val();
                precio_venta=$('#pprecio_venta').val();

                if(idarticulo!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="" ){
                    subtotal[cont]=(cantidad*precio_compra);
                    total=total+subtotal[cont];
                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'">'+precio_compra+'</td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td><td><input type="number" name="subtotal[]" value="'+subtotal+'">'+subtotal[cont]+'</td></tr>';
                    cont++;
                    limpiar();
                    $('#total').html("$ " + total);
                    evaluar();
                    $('#detalles').append(fila);
                }
                else{
                    alert("Error al ingresas el detalle del ingreso, revise los datos del articulo");
                }
            }
            function limpiar(){
                $('#pcantidad').val("");
                $('#pprecio_compra').val("");
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
            function eliminar(){
                total=total-subtotal[index];
                $("#total").html("$ " + total);
                $("#fila" + index).remove();
                evaluar();
            }
        </script>
    @endpush
@endsection