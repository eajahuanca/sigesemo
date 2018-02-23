@extends('layouts.app')

@section('titulocontenido','Documentación Previa')
@section('titulopreview','cargar nueva documentación previa')
@section('tituloform','Documentación')
@section('styles')
@endsection
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
                    {{ Form::open(['route' => 'previous.store', 'files' => true, 'name' => 'frmDocumento']) }}
                        @include('admin.previous.form')
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success btn-social" name="btnaceptar"><i class="fa fa-save"></i> Aceptar</button>
                            <button type="submit" class="btn btn-sm btn-primary btn-social" name="btnpendiente"><i class="fa fa-edit"></i> Pendiente</button>
                            <button type="submit" class="btn btn-sm btn-warning btn-social" name="btnrechazado"><i class="fa fa-trash"></i> Rechazar</button>
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
	<script>
		$("#liprevious").addClass("active");

        //Municipios por departamento
        $("select[id=pre_municipio]").empty();
        $("select[id=pre_municipio]").append("<option value='' disabled selected style='display:none;'></option>");
        $("select[id=pre_depto]").change(function(){
            $("select[id=pre_municipio]").empty();
            var depto = $("select[id=pre_depto]").val();
            $.get("{{ url('/getmunicipio') }}" + '/' + depto, function(rpta){
                $.each(rpta, function(index, value){
                    $("select[id=pre_municipio]").append("<option value='" + value['mun_municipio'] + "'>" + value['mun_municipio'] + "</option>");
                });
                $("select[id=pre_municipio]").append("<option value='Ninguno'>Ninguno</option>");
            });
        });
    </script>
@endsection