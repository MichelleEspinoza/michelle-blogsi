@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="text-secondary">Nuevo Proveedor</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
            {{Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off'))}}
            @csrf
            <div class="row text-dark">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required value="{{old('nombre')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion" required value="{{old('direccion')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="tipo_documento class="form-label"">Documento</label>
                        <select name="tipo_documento" class="form-control">
                                <option value="DNI">DNI</option>
                                <option value="CURP">CURP</option>
                                <option value="PASS">PASS</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="num_documento" class="form-label">Número de documento</label>
                        <input type="text" class="form-control" name="num_documento" required value="{{old('num_documento')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="telefono"  value="{{old('telefono')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email"  value="{{old('email')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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