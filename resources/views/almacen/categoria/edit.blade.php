@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="text-secondary">Editar Categoría {{$categoria->nombre}}</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
            <form action="{{ route('categoria.update',$categoria->id) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="form-group text-dark">
            	<label for="nombre">Nombre</label>
            	<input type="text" class="form-control" name="nombre" value="{{$categoria->nombre}}" placeholder="Nombre...">
                
            </div>
            <div class="form-group text-dark">
            	<label for="descripcion">Descripción</label>
            	<input type="text" class="form-control" name="descripcion" value="{{$categoria->descripcion}}" placeholder="Descripción...">
                
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            </form>	
            
		</div>
	</div>
@endsection