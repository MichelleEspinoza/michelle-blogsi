@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo cliente</h3>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
            {{Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))}}
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" required value="{{old('nombre')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-label" class="form-group">
                        <label for="direccion">Direccion</label>
                        <input class="form-control" type="text" name="direccion" required value="{{old('direccion')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label"for="tipo_documento">Documento</label>
                        <select name="tipo_documento" class="form-select">
                                <option value="DNI">DNI</option>
                                <option value="CURP">CURP</option>
                                <option value="PASS">PASS</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="num_documento">Número de documento</label>
                        <input class="form-control" type="text" name="num_documento" required value="{{old('num_documento')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="telefono">Telefono</label>
                        <input class="form-control" type="text" name="telefono"  value="{{old('telefono')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email"  value="{{old('email')}}">
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