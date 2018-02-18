@extends('layouts.app')

@section('titulocontenido','Permisos de usuario')
@section('titulopreview','Permisos registrados en el sistema')
@section('tituloform','Permisos')
@section('styles')
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos de usuario</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @can('permisos.create')
                    <a href="{{ route('permisos.create') }}" class="btn btn-sm btn-primary btn-social">
                        <i class="fa fa-plus-square"></i> Nuevo Permiso
                    </a>
                    @endcan
                    <br>
                    <div style="border:1px solid #EAE9E8;padding:6px 3px 3px 7px;border-radius:7px;-webkit-border-radius:7px;-moz-border-radius:7px;margin-top:5px;overflow-x:scroll;">
                        <table class="table table-striped table-hover table-bordered" id="example1">
                            <thead class="btn-primary">
                                <tr>
                                    <th width="10px">ID</th>
                                    <th><i class="fa fa-th-large"></i> Nombre del permiso</th>
                                    <th><i class="fa fa-bars"></i> Descripción del permiso</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tfoot class="btn-primary">
                                <tr>
                                    <th width="10px">ID</th>
                                    <th><i class="fa fa-th-large"></i> Nombre del permiso</th>
                                    <th><i class="fa fa-bars"></i> Descripción del permiso</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($permiso as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td width="10px">
                                        @can('permisos.show')
                                        <button type="button" onclick="detalleFunction({{ $item->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalVer"><i class="fa fa-eye"></i></button>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('permisos.edit')
                                        <a href="{{ route('permisos.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalVer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detalle del Permiso</h4>
                </div>
                <div class="modal-body" id="detallePermiso">
                </div>
                <div class="modal-footer bg-yellow">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
	<script src="{{ asset('plugins/lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('plugins/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
		$("#liparametrizacion").addClass("treeview active");
        function detalleFunction(idPermiso){
            var _url = "{{ url('permisos')}}" + "/" + idPermiso;
            $.ajax({
                url: _url,
                dataType: 'html',
                success: function(data){
                    $("#detallePermiso").html(data);
                },
                error: function(e){
                    console.log('Error : ' + e);
                }
            });
		}
		$(function(){
			$('#example1').DataTable();
		});
    </script>
@endsection