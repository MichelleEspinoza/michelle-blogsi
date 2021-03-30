@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <h3 class="text-secondary">Listado de Articulos
            <button class="btn btn-light"> <a class="text-white" href="articulo/create"> Nuevo</a></button>
        </h3>
        @include('almacen.articulo.search')
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
                <th>Código</th>
                <th>Categorias</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
                @foreach ($articulos as $art)
                <tr>
                    <td>{{ $art->id }}</td>
                    <td>{{ $art->nombre }}</td>
                    <td>{{ $art->codigo }}</td>
                    <td>{{ $art->categoria }}</td>
                    <td>{{ $art->stock }}</td>
                    <td>
                        <img src="{{asset('img/articulos/'.$art->imagen)}}" alt="{{$art->nombre}}" height="auto" width="60px" class="img-fluid">
                    </td>
                    <td>{{ $art->estado }}</td>
                    <td>
                         <a href="{{ route('articulo.edit', $art->id) }}"><button class="btn btn-info">Editar</button></a>
                         <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-delete-{{$art->id}}">Eliminar</button>
                           
                    </td>
                </tr>
                @include('almacen.articulo.modal')
                @endforeach
            </table>

        </div>
        {{ $articulos->links() }} 
    </div>
</div>

@endsection

  
  