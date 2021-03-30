@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <h3>Listado de usuarios
            <button class="btn btn-light"> <a class="text-white" href="usuario/create"> Nuevo</a></button>
        </h3>
        @include('seguridad.usuario.search')
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
                <th>email</th>
                <th>Opciones</th>
                </thead>
                @foreach ($usuarios as $usu)
                <tr>
                    <td>{{ $usu->id }}</td>
                    <td>{{ $usu->name }}</td>
                    <td>{{ $usu->email }}</td>
                    <td>
                         <a href="{{ route('usuario.edit', $usu->id) }}"><button class="btn btn-info">Editar</button></a>
                         <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-delete-{{$usu->id}}">Eliminar</button>
                           
                    </td>
                </tr>
                @include('seguridad.usuario.modal')
                @endforeach
            </table>

        </div>
        {{ $usuarios->links() }}
    </div>
</div>

@endsection

  
  