@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <h3 class="text-secondary">Listado de Venta
            <button class="btn btn-light"> <a class="text-white" href="venta/create"> Nuevo</a></button>
        </h3>
        @include('ventas.venta.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered
            table-condensed table-hover">
                <thead>
                <th>Id</th>
                <th>Fecha</th>
                <th>cliente</th>
                <th>Comprobante</th>
                <th>Impuestos</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
                @foreach ($ventas as $ven)
                <tr>
                    <td>{{ $ven->id }}</td>
                    <td>{{ $ven->updated_at }}</td>
                    <td>{{ $ven->nombre }}</td>
                    <td>{{ $ven->tipo_comprobante.': '.$ven->serie_comprobante.'-'.$ven->num_comprobante }}</td>
                    <td>{{ $ven->impuesto }}</td>
                    <td>{{ $ven->total_venta }}</td>
                    <td>{{ $ven->estado }}</td>
                    <td>
                         <a href="{{ route('venta.show', $ven->id) }}"><button class="btn btn-primary"><i class="fa fa-eye"></i> Detalles</button></a>
                         <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-delete-{{$ven->id}}">Anular</button>
                           
                    </td>
                </tr>
                @include('ventas.venta.modal')
                @endforeach
            </table>

        </div>
        {{ $ventas->links() }}
    </div>
</div>

@endsection

  
  