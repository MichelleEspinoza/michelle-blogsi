@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Categoría</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
            {{Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off'))}}
            @csrf
            <div class="form-group">
            	<label for="nombre" class="form-label">Nombre</label>
            	<input type="text" class="form-control" name="nombre" placeholder="Nombre...">
                
            </div>
            <div class="form-group">
            	<label for="descripcion" class="form-label">Descripción</label>
            	<input type="text" class="form-control" name="descripcion" placeholder="Descripción...">
                
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{{Form::close()}}		
            
		</div>
	</div>
@endsection