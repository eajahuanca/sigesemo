@extends('layouts.app')

@section('titulocontenido','Cumplimiento de elegibilidad')
@section('titulopreview','Cargar documento de cumplimiento de elegibilidad legal')
@section('tituloform','Elegibilidad')
@section('styles')
@endsection
@section('content')
    
    <div class="row">
		<div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> Actualizar Cumplimiento de Elegibilidad</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="content">
                    {{ Form::model($elegible, ['route' => ['eleleg.update', $elegible->id], 'method' => 'PUT','files' => true, 'name' => 'frmDocumentos']) }}
                        @include('admin.elegible.legal.form')
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-social" name="btnaceptar"><i class="fa fa-save"></i> Actualizar y Aceptar</button>
                            <button type="submit" class="btn btn-primary btn-social" name="btnpendiente"><i class="fa fa-edit"></i> Pendiente</button>
                            <button type="submit" class="btn btn-warning btn-social" name="btnrechazado"><i class="fa fa-trash"></i> Rechazar</button>
                            <a href="{{ route('eleleg.index') }}" class="btn btn-danger btn-social" name="btncancelar"><i class="fa fa-reply-all"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection
@section('scripts')
    <script>
        $("#lieleleg").addClass("active");
    </script>
@endsection