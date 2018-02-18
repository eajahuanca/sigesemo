<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_carnet', 'Carnet de Identidad') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-cube"></i>
				</div>
				{{ Form::text('us_carnet', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			{{ Form::label('us_expedido', 'Expedido') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-bars"></i>
				</div>
				{{ Form::select('us_expedido', ['LP'=> 'LP', 'OR'=> 'OR', 'CBBA'=> 'CBBA', 'SC'=> 'SC', 'PT'=> 'PT', 'BN'=> 'BN', 'CH'=> 'CH', 'TJ'=> 'TJ', 'PA'=> 'PA'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_genero', 'Género') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-user-plus"></i>
				</div>
				{{ Form::select('us_genero', ['Masculino'=> 'Masculino', 'Femenina'=> 'Femenina'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_nombre', 'Nombre(s)') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-user"></i>
				</div>
				{{ Form::text('us_nombre',  null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_paterno', 'Apellido Paterno') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-user"></i>
				</div>
				{{ Form::text('us_paterno', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_materno', 'Apellido Materno') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-user"></i>
				</div>
				{{ Form::text('us_materno', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('idprofesion', 'Profesión') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-suitcase"></i>
				</div>
				{{ Form::select('idprofesion', ['1'=> '1'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('idcargo', 'Cargo') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-columns"></i>
				</div>
				{{ Form::select('idcargo', ['1'=> '1'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('idarea', 'Área de Trabajo') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-list-alt"></i>
				</div>
				{{ Form::select('idarea', ['1'=> '1'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
</div>
<h3>Datos de cuenta de usuario</h3>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('email', 'Correo Electrónico') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-envelope"></i>
				</div>
				{{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_cuenta', 'Cuenta de usuario') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-user"></i>
				</div>
				{{ Form::text('us_cuenta', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<?php error_reporting(0); ?>
		@if(!$usuario->id)
		<div class="form-group">
			{{ Form::label('password', 'Contraseña') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-lock"></i>
				</div>
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>
		</div>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_telefono', 'Teléfono/Celular') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-phone"></i>
				</div>
				{{ Form::text('us_telefono', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			{{ Form::label('us_imagen', 'Avatar') }}
			<div class="input-group">
				<div class="input-group-addon">
					@if($usuario->id)
					<img src="{{ asset($usuario->us_imagen) }}" class="img-circle" width="20px"/>
					@else
					<i class="fa fa-user"></i>
					@endif
				</div>
				{{ Form::file('us_imagen', ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			{{ Form::label('us_observaciones', 'Observaciones generales') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-bars"></i>
				</div>
				{{ Form::textarea('us_observaciones', null, ['class' => 'form-control', 'rows' => 5]) }}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('us_estado', 'Estado de la cuenta') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-square"></i>
				</div>
				{{ Form::select('us_estado', [true=> 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
</div>
<h3>Lista de roles</h3>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="form-group">
			<ul class="list-unstyled">
				@foreach($role as $roles)
				<li>
					<b>
					{{ Form::checkbox('roles[]', $roles->id, null, ['class' => 'flat-red']) }}
					{{ $roles->name }}
					</b>
					<em>({{ $roles->description }})</em>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>