<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('name', 'Nombre del rol') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-list"></i>
				</div>
				{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('slug', 'URL Amigable (slug)') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-link"></i>
				</div>
				{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			{{ Form::label('description', 'Descripción del rol') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-bars"></i>
				</div>
				{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) }}
			</div>
		</div>
	</div>
</div>
<div class="box box-widget widget-user-2">
	<div class="widget-user-header">
		<div class="row">
			<div class="col-md-3 text-right">
				<img src="{{ asset('plugins/login/img/permisos.png') }}" alt="Permisos Especiales">
			</div>
			<div class="col-md-7">
				<h3 class="widget-user-username">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permiso Escpecial</h3><br>
				<h5 class="widget-user-desc">
					<div class="form-group">
							<label>{{ Form::radio('special', 'all-access', null, ['class' => 'flat-red']) }} &nbsp;&nbsp;Acceso total</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label>{{ Form::radio('special', 'no-access', null, ['class' => 'flat-red']) }} &nbsp;&nbsp;Ningún acceso</label>
					</div>
				</h5>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<img src="{{ asset('plugins/login/img/permisos2.png') }}" alt="Permisos Especiales">
			</div>
			<div class="col-md-7">
				<h3 class="widget-user-username">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lista de Permisos</h3><br>
				<h5 class="widget-user-desc">
					<div class="form-group">
						<ul class="list-unstyled">
							@foreach($permissions as $permission)
							<li>
								<label>
								{{ Form::checkbox('permissions[]', $permission->id, null,['class' => 'flat-red']) }}
								{{ $permission->name }}
								<em>({{ $permission->description }})</em>
								</label>
							</li>
							@endforeach
						</ul>
					</div>
				</h5>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>