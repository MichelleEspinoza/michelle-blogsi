@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xl-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Articulo</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
            {{Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files'=>true))}}
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required value="{{old('nombre')}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="idcategoria"  class="form-label">Categoría</label>
                        <select name="idcategoria" class="form-select">
                            @foreach($categorias as $cat)
                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="codigo"  class="form-label">Código</label>
                        <input type="text" class="form-control" name="codigo" required value="{{old('codigo')}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="stock"  class="form-label">Stock</label>
                        <input type="text" class="form-control" name="stock" required value="{{old('stock')}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" required value="{{old('descripcion')}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen"  class="form-label">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>
            

			{{Form::close()}}		
            
		</div>
	</div>
@endsection