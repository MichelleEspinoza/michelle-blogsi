@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="text-secondary">Editar Cliente {{$persona->nombre}}</h3>


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
			
            <form action="{{ route('cliente.update',$persona->id)}}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row text-dark">
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" required value="{{ $persona-> nombre}}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="form-label" for="direccion">Direccion</label>
                            <input class="form-control" type="text" name="direccion" required value="{{$persona->direccion}}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="form-label" for="tipo_documento">Documento</label>
                            <select name="tipo_documento" class="form-select">
                                @if($persona->tipo_documento=='DNI')
                                    <option value="DNI" selected>DNI</option>
                                    <option value="CURP">CURP</option>
                                    <option value="PASS">PASS</option>
                                @elseif($persona->tipo_documento=='CURP')
                                    <option value="DNI" >DNI</option>
                                    <option value="CURP" selected>CURP</option>
                                    <option value="PASS">PASS</option>
                                @else
                                    <option value="DNI" >DNI</option>
                                    <option value="CURP" >CURP</option>
                                    <option value="PASS" selected>PASS</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="form-label" for="num_documento">Número de documento</label>
                            <input class="form-control" type="text" name="num_documento" required value="{{$persona->num_documento}}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="form-label" for="telefono">Telefono</label>
                            <input class="form-control" type="text" name="telefono"  value="{{$persona->telefono}}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="text" name="email"  value="{{$persona->email}}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>	
            
@endsection