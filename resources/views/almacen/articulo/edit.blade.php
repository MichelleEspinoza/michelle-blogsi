@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="text-secondary">Editar Articulo {{$articulo->nombre}}</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
			
            <form action="{{ route('articulo.update',$articulo->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row text-dark">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required value="{{$articulo->nombre}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="idcategoria">Categoría</label>
                            <select name="idcategoria" class="form-control">
                                @foreach($categorias as $cat)
                                    @if($cat->id==$articulo->id)
                                    <option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
                                    @else
                                    <option value="{{$cat->id}}" >{{$cat->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" name="codigo" required value="{{$articulo->codigo}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="stock" required value="{{$articulo->stock}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" required value="{{$articulo->descripcion}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" class="form-control">
                            @if(($articulo->imagen)!=null)
                                <img src="{{asset('img/articulos/'.$articulo->imagen)}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                    </div>
                </div>    

            </form>	
            
@endsection