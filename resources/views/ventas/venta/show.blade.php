@extends ('layouts.admin')
@section ('contenido')
            <div class="row text-dark">
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="proveedor">Cliente</label>
                       <p>{{$venta->nombre}}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="direccion">Tipo Comprobante</label>
                        <p>{{$venta->tipo_comprobante}}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="serie_comprobante">Serie Comprobante</label>
                        <p>{{$venta->serie_comprobante}}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="num_comprobante">Número de Comprobante</label>
                        <p>{{$venta->num_comprobante}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table class="table table-hovertable-striped table-bordered table-condensed">
                        <thead class="table-primary">
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precio Venta</th>
                            <th>Descuento</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">{{$venta->total_venta}}</h4></th>
                        </tfoot>
                        <tbody>
                            @foreach($detalles as $det)
                            <tr>
                                <td>{{$det->articulo}}</td>
                                <td>{{$det->cantidad}}</td>
                                <td>{{$det->precio_venta}}</td>
                                <td>{{$det->descuento}}</td>
                                <td>{{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection