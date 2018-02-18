@extends('layouts.app')

@section('titulocontenido','Denegado')
@section('titulopreview','usted no puede acceder')
@section('tituloform','Acceso denegado')
@section('styles')
@endsection
@section('content')

	<div class="row">
		<div class="col-md-12">
			<img src="{{ asset('plugins/error/403.png') }}" alt="Error 403" width="100%">
			<div class="box box-widget widget-user">
			  	<div class="box-footer bg-yellow-active">		
					<span style="font-size:6em;font-weight:bolder;"><center>403</center></span>
					<div class="description-block">
						<h5 class="description-header">Usted no cuenta con los privilegios necesarios para acceder a esta área</h5>
						<span class="description-text">Pongase en contacto con el administrador del sistema</span>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('scripts')
@endsection