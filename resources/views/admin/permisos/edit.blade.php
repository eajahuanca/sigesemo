@extends('layouts.app')

@section('titulocontenido','Permisos de usuario')
@section('titulopreview','actualizar datos del Permiso')
@section('tituloform','Permisos')
@section('styles')
@endsection
@section('content')

	<div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> Editar Permiso</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="content">                   
                    {!! Form::model($permiso, ['route' => ['permisos.update', $permiso->id], 'method' => 'PUT']) !!}
                        @include('admin.permisos.form')
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success btn-social" name="btneditar"><i class="fa fa-edit"></i> Actualizar</button>
                            <button type="reset" class="btn btn-sm btn-danger btn-social" name="btncancelar"><i class="fa fa-reply-all"></i> Cancelar</button>
                            <a href="{{ route('permisos.index') }}" class="btn btn-sm btn-primary btn-social" name="btnregresar"><i class="fa fa-sign-out"></i> Regresar</a>
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
    $("#liparametrizacion").addClass("treeview active");
</script>
@endsection