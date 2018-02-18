<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('pre_sigehr', 'Hoja de Ruta') }}
			<div class="input-group">
				<div class="input-group-addon bg-aqua-active">
					<i class="fa fa-search"></i>
				</div>
				{{ Form::text('pre_sigechr', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('pre_depto', 'Departamento') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-gear"></i>
				</div>
				{{ Form::select('pre_depto', ['La Paz' => 'La Paz', 'Cochabamba' => 'Cochabamba', 'Oruro' => 'Oruro', 'Potosi' => 'Potosi', 'Santa Cruz' => 'Santa Cruz', 'Beni' => 'Beni', 'Chuquisaca' => 'Chuquisaca', 'Tarija' => 'Tarija', 'Pando' => 'Pando'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('pre_entidad', 'Entidad') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-circle"></i>
				</div>
				{{ Form::select('pre_entidad', ['Gobierno Autonomo Municipal' => 'Gobierno Autonomo Municipal', 'Gobierno Autonomo Departamental' => 'Gobierno Autonomo Departamental', 'Otros' => 'Otros'], null, ['class' => 'form-control select2']) }}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="well well-lg">
			<h3>Documentos</h3>
			<div class="row">
				<div class="col-md-3"><label>{{ Form::checkbox('pre_nota_check', 1, null,['class' => 'flat-red']) }} Nota de Solicitud</label></div>
				<div class="col-md-1">
					<a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Nota de Solicitud"/></a>
				</div>
				<div class="col-md-8">		
					{{ Form::file('pre_nota') }}
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>{{ Form::checkbox('pre_ficha_check', 1, null,['class' => 'flat-red']) }} Ficha Técnica</label></div>
				<div class="col-md-1">
					<a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Ficha Técnica"/></a>
				</div>
				<div class="col-md-8">
					{{ Form::file('pre_ficha') }}
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>{{ Form::checkbox('pre_legal_check', 1, null,['class' => 'flat-red']) }} Doc. Responsable Legal</label></div>
				<div class="col-md-1">
					<a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Doc. Responsable Legal"/></a>
				</div>
				<div class="col-md-8">
					{{ Form::file('pre_legal') }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			{{ Form::label('pre_obs', 'Observaciones generales') }}
			{{ Form::textarea('pre_obs', null, ['class' => 'form-control', 'rows' => 5]) }}
		</div>
	</div>
</div>