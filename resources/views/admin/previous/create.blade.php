@extends('layouts.app')

@section('titulocontenido','Documentación Previa')
@section('titulopreview','cargar nueva documentación previa')
@section('tituloform','Documentación')
@section('styles')
@endsection
	<link rel="stylesheet" href="{{ asset('plugins/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@section('content')

	<div class="row">
		<div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> Nueva Documentación Previa</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="content">
                    {{ Form::open(['route' => 'previous.store', 'files' => true]) }}
                        @include('admin.previous.form')
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success btn-social" name="btnaceptar"><i class="fa fa-save"></i> Aceptar</button>
                            <button type="submit" class="btn btn-sm btn-primary btn-social" name="btnpendiente"><i class="fa fa-edit"></i> Pendiente</button>
                            <button type="submit" class="btn btn-sm btn-warning btn-social" name="btnrechazo"><i class="fa fa-trash"></i> Rechazar</button>
                            <a href="{{ route('previous.index') }}" class="btn btn-sm btn-danger btn-social" name="btncancelar"><i class="fa fa-reply-all"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection
@section('scripts')
	<script src="{{ asset('plugins/lte/bower_components/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('plugins/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script>
		$("#liprevious").addClass("active");
		$(function () {
			CKEDITOR.replace('pre_obs')
			$('.textarea').wysihtml5()
		})
	</script>
@endsection