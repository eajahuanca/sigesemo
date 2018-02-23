<div class="row">
	<div class="col-md-3">
		<div class="form-group {{ $errors->has('pre_sigechr')?' has-error':'' }}">
			{{ Form::label('pre_sigehr', 'Hoja de Ruta') }}
			<div class="input-group">
				<div class="input-group-addon bg-aqua-active">
					<i class="fa fa-search"></i>
				</div>
				{{ Form::text('pre_sigechr', null, ['class' => 'form-control', 'placeholder' => 'Busque la HR correspondiente']) }}
			</div>
			@if($errors->has('pre_sigechr'))
                <span style="color:red;">
                    <strong>{{ $errors->first('pre_sigechr') }}</strong>
                </span>
            @endif
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group {{ $errors->has('identidad')?' has-error':'' }}">
			{{ Form::label('identidad', 'Entidad') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-circle"></i>
				</div>
				{{ Form::select('identidad', $entidades, null, ['class' => 'form-control select2']) }}
			</div>
			@if($errors->has('identidad'))
				<span style="color:red;">
					<strong>{{ $errors->first('identidad') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group {{ $errors->has('pre_depto')?' has-error':'' }}">
			{{ Form::label('pre_depto', 'Departamento') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-gear"></i>
				</div>
				{{ Form::select('pre_depto', ['La Paz' => 'La Paz', 'Cochabamba' => 'Cochabamba', 'Oruro' => 'Oruro', 'Potosi' => 'Potosi', 'Santa Cruz' => 'Santa Cruz', 'Beni' => 'Beni', 'Chuquisaca' => 'Chuquisaca', 'Tarija' => 'Tarija', 'Pando' => 'Pando', 'Nacional' => 'Nacional'], null, ['class' => 'form-control select2']) }}
			</div>
			@if($errors->has('pre_depto'))
                <span style="color:red;">
                    <strong>{{ $errors->first('pre_depto') }}</strong>
                </span>
            @endif
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group {{ $errors->has('pre_municipio')?' has-error':'' }}">
			{{ Form::label('pre_municipio', 'Municipio(s)') }}
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-gear"></i>
				</div>
				{{ Form::select('pre_municipio',['aqui' => 'aquii'], null, ['class' => 'form-control select2', 'multiple' => 'multiple']) }}
			</div>
			@if($errors->has('pre_municipio'))
				<span style="color:red;">
					<strong>{{ $errors->first('pre_municipio') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="well well-lg">
			<?php error_reporting(0); ?>
			<h3>Selecciona el Tipo de Programa (Criterio)</h3>
			@foreach($programas as $programa)
			{{ dd($programa) }}
			<div class="row">
				<div class="col-md-12">
					<label>{{ Form::checkbox('pre_programa[]', $programa->pro_sigla, null,['class' => 'flat-red']) }}
						{!! $programa->pro_sigla.' - '.$programa->pro_nombre !!}
					</label>
					@if($errors->has('pre_programa[]'))
						<span style="color:red;">
							<strong>{{ $errors->first('pre_programa[]') }}</strong>
						</span>
					@endif
				</div>	
			</div>
			@endforeach
			<h3>Documentos Previos</h3>
			<div class="row">
				<div class="col-md-3"><label>{{ Form::checkbox('pre_nota_check', 1, null,['class' => 'flat-red']) }} Nota de Solicitud</label>
					@if($errors->has('pre_nota_check'))
						<span style="color:red;">
							<strong>{{ $errors->first('pre_nota_check') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-md-1">
					@if($previou->id && $previou->pre_nota != '')
					<a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Nota de Solicitud"/></a>
					@endif
				</div>
				<div class="col-md-8">
					{{ Form::file('pre_nota') }}
					@if($errors->has('pre_nota'))
						<span style="color:red;">
							<strong>{{ $errors->first('pre_nota') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>{{ Form::checkbox('pre_ficha_check', 1, null,['class' => 'flat-red']) }} Ficha Técnica</label>
					@if($errors->has('pre_ficha_check'))
						<span style="color:red;">
							<strong>{{ $errors->first('pre_ficha_check') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-md-1">
					@if($previou->id && $previou->pre_ficha != '')
					<a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Ficha Técnica"/></a>
					@endif
				</div>
				<div class="col-md-8">
					{{ Form::file('pre_ficha') }}
					@if($errors->has('pre_ficha'))
						<span style="color:red;">
							<strong>{{ $errors->first('pre_ficha') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>{{ Form::checkbox('pre_legal_check', 1, null,['class' => 'flat-red']) }} Doc. Responsable Legal</label>
					@if($errors->has('pre_legal_check'))
						<span style="color:red;">
							<strong>{{ $errors->first('pre_legal_check') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-md-1">
					@if($previou->id && $previou->pre_legal != '')
					<a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Doc. Responsable Legal"/></a>
					@endif
				</div>
				<div class="col-md-8">
					{{ Form::file('pre_legal') }}
					@if($errors->has('pre_legal'))
						<span style="color:red;">
							<strong>{{ $errors->first('pre_legal') }}</strong>
						</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group {{ $errors->has('pre_obs')?' has-error':'' }}">
			{{ Form::label('pre_obs', 'Observaciones generales') }}
			{{ Form::textarea('pre_obs', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las observaciones siempre y cuando sea pendiente o rechazado','rows' => 4]) }}
			@if($errors->has('pre_obs'))
				<span style="color:red;">
					<strong>{{ $errors->first('pre_obs') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>