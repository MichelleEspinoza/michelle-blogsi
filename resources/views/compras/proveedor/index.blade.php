@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <h3 class="text-secondary">Listado de Proveedores
            <button class="btn btn-light"> <a class="text-white" href="proveedor/create"> Nuevo</a></button>
        </h3>
        @include('compras.proveedor.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered
            table-condensed table-hover">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Tipo de Doc.</th>
                <th>Número de Doc.</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Opciones</th>
                </thead>
                @foreach ($personas as $per)
                <tr>
                    <td>{{ $per->id }}</td>
                    <td>{{ $per->nombre }}</td>
                    <td>{{ $per->tipo_documento }}</td>
                    <td>{{ $per->num_documento }}</td>
                    <td>{{ $per->telefono }}</td>
                    <td>{{ $per->email }}</td>
                    <td>
                         <a href="{{ route('proveedor.edit', $per->id) }}"><button class="btn btn-info">Editar</button></a>
                         <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-delete-{{$per->id}}">Eliminar</button>
                           
                    </td>
                </tr>
                @include('compras.proveedor.modal')
                @endforeach
            </table>

        </div>
        {{ $personas->links() }}
    </div>
</div>

@endsection

  
  