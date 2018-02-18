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