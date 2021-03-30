@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <h3>Listado de categorias
            <button class="btn btn-light"> <a class="text-white" href="categoria/create"> Nuevo</a></button>
        </h3>
        @include('almacen.categoria.search')
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
                <th>Descripción</th>
                <th>Opciones</th>
                </thead>
                @foreach ($categorias as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->nombre }}</td>
                    <td>{{ $cat->descripcion }}</td>
                    <td>
                         <a href="{{ route('categoria.edit', $cat->id) }}"><button class="btn btn-info">Editar</button></a>
                         <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-delete-{{$cat->id}}">Eliminar</button>
                           
                    </td>
                </tr>
                @include('almacen.categoria.modal')
                @endforeach
            </table>

        </div>
        {{ $categorias->links() }}
    </div>
</div>

@endsection

  
  