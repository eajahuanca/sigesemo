@extends('layouts.app')

@section('titulocontenido','Datos de Perfil')
@section('titulopreview','mis datos personales y cuenta de usuario')
@section('tituloform','Mis Datos')
@section('styles')
	<link href="{{ asset('plugins/uploadFile/css/jquery.mn-file.css') }}" rel="stylesheet" type="text/css">
	<style>		
		.previewContainer {
			text-align: center;
			height: 260px;
			margin-top: 20px;
		}
		
		.previewContainer img {
			border: 5px solid #FFF;
			box-shadow: 0 0 3px -1px rgba(0, 0, 0, 0.8);
			max-height: 260px;
		}
	</style>
@endsection
@section('content')

	@include('fechas.fechaHora')
	<div class="row">
        <div class="col-md-4">
          	<!-- Profile Image -->
          	<div class="box box-primary">
            	<div class="box-body box-profile">
              		<img class="profile-user-img img-responsive img-circle" src="{{ asset(Auth::user()->us_imagen) }}" alt="">
					<h3 class="profile-username text-center">{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno }}</h3>
					<p class="text-muted text-center">{{ Auth::user()->email }}</p>  
              		<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<a>Cuenta de Usuario</a> <b class="pull-right">{{ Auth::user()->us_cuenta }}</b>
						</li>
						<li class="list-group-item">
							<a>Profesión</a> <b class="pull-right">{{ Auth::user()->idprofesion }}</b>
						</li>
						<li class="list-group-item">
							<a>Cargo Actual</a> <b class="pull-right">{{ Auth::user()->idcargo }}</b>
						</li>
						<li class="list-group-item">
							<a>Fecha de Registro</a> <b class="pull-right">{{ soloFecha(Auth::user()->created_at) }}</b>
						</li>
						<li class="list-group-item">
							<a>Hora de Registro</a> <b class="pull-right">{{ soloHora(Auth::user()->created_at) }}</b>
						</li>
						<li class="list-group-item">
							<a>Cantidad de ingresos al sistema</a><b class="pull-right">{{ Auth::user()->us_ingresoasis }}</b>
						</li>
						<li class="list-group-item">
							<a>Fecha de Ingreso/Sistema</a><b class="pull-right">{{ soloFecha(Auth::user()->us_fechaingreso) }}</b>
						</li>
						<li class="list-group-item">
							<a>Hora de Ingreso/Sistema</a><b class="pull-right">{{ soloHora(Auth::user()->us_fechaingreso) }}</b>
						</li>
					</ul>
            	</div>
            	<!-- /.box-body -->
          	</div>
          	<!-- /.box -->
        </div>
        <!-- /.box -->
        <!-- /.col -->
        <div class="col-md-8">
          	<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#contactos" data-toggle="tab"><i class="fa fa-user"></i> Contactos</a></li>
					<li><a href="#cambiarImagen" data-toggle="tab"><i class="fa fa-folder"></i> Cambiar Imagen</a></li>
					<li><a href="#cambiarContrasena" data-toggle="tab"><i class="fa fa-unlock-alt"></i> Cambiar Contraseña</a></li>
				</ul>
            	<div class="tab-content">
              		<div class="active tab-pane" id="contactos">
						<!-- Post -->
						@foreach($usuario as $uitem)
                		<div class="post">
                  			<div class="user-block">
                    			<img class="img-circle img-bordered-sm" src="{{ asset($uitem->us_imagen) }}" alt="">
                        		<span class="username">
                          			<a href="#">{{ $uitem->us_nombre.' '.$uitem->us_paterno.' '.$uitem->us_materno }}</a>
                          			<a href="#" class="pull-right btn-box-tool"><i class="fa fa-calendar"></i> Registrado el : {{ fechaHora($uitem->created_at) }}</a>
                        		</span>
                    			<span class="description"><i class="fa fa-user"></i> {{ $uitem->idprofesion }} - {{ $uitem->idcargo }}</span>
                  			</div>
						</div>
						@endforeach
                		<!-- /.post -->
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="cambiarImagen">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								{!! Form::open(['url' => 'changeImg', 'method' => 'PUT', 'id' => 'user-img', 'files' => true]) !!}
								<h2>Vista Previa de la Imagen</h2>
								<div class="customFile" data-controlMsg="Seleccione Imagen">
									<span class="selectedFile">Archivos sin seleccionar...</span>
									{!! Form::file('us_imagen', ['class' => 'widthPreview']) !!}
								</div>
								{!! Form::close() !!}
								<div class="previewContainer">
									<img class="preview" src="{{ Auth::user()->us_imagen }}" alt="" />
								</div>
								@if($errors->has('us_imagen'))
									<span class="help-block">
										<strong>{{ $errors->first('us_imagen') }}</strong>
									</span>
								@endif
								<br/>
								<center><a class="btn btn-success btn-social" onclick="event.preventDefault(); document.getElementById('user-img').submit();"><i class="fa fa-edit"></i> <b>Cambiar Imagen</b></a></center>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="cambiarContrasena">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								{!! Form::open(['url' => 'changePass', 'method' => 'PUT', 'id' => 'user-pass']) !!}
								<div class="form-group {{ $errors->has('password_old')? 'has-error':'' }}">
									{!! Form::label('password_old', 'Contraseña antigua') !!}
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-unlock-alt"></i>
										</span>
										{!! Form::password('password_old', ['class' => 'form-control']) !!}
									</div>
									@if($errors->has('password_old'))
										<span class="help-block">
											<strong>{{ $errors->first('password_old') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
									{!! Form::label('password', 'Contraseña Nueva') !!}
									<div class="input-group">
										<span class="input-group-addon color-orange">
											<i class="fa fa-lock"></i>
										</span>
										{!! Form::password('password', ['class' => 'form-control']) !!}
									</div>
									@if($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('password_confirm')? 'has-error':'' }}">
									{!! Form::label('password_confirm', 'Confirmar Contraseña') !!}
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-lock"></i>
										</span>
										{!! Form::password('password_confirm', ['class' => 'form-control']) !!}
									</div>
									@if($errors->has('password_confirm'))
										<span class="help-block">
											<strong>{{ $errors->first('password_confirm') }}</strong>
										</span>
									@endif
								</div>
								{!! Form::close() !!}
								<a class="btn btn-success btn-social" onclick="event.preventDefault(); document.getElementById('user-pass').submit();"><i class="fa fa-edit"></i> <b>Cambiar Contraseña</b></a>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
					<!-- /.tab-pane -->
            	</div>
            	<!-- /.tab-content -->
          	</div>
          	<!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
@section('scripts')
	<script src="{{ asset('plugins/uploadFile/js/jquery.mn-file.js') }}"></script>
	<script>
		$(function() {
			$("[type=file]").mnFileInput();
			$(".widthPreview").mnFileInput({
				'preview': '.preview'
			});
		});
	</script>
@endsection