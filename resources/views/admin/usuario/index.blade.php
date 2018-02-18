@extends('layouts.app')

@section('titulocontenido','Usuarios')
@section('titulopreview','Usuarios registrados en el sistema')
@section('tituloform','Usuarios')
@section('styles')
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de usuarios</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @can('users.nuevo')
                    <a href="{{ route('users.nuevo') }}" class="btn btn-sm btn-primary btn-social">
                        <i class="fa fa-plus-square"></i> Nuevo Usuario
                    </a>
                    @endcan
                    <br>
                    <div style="border:1px solid #EAE9E8;padding:6px 3px 3px 7px;border-radius:7px;-webkit-border-radius:7px;-moz-border-radius:7px;margin-top:5px;overflow-x:scroll;">
                        <table class="table table-striped table-hover table-bordered" id="example1" style="font-size:0.9em;">
                            <thead>
                                <tr class="btn-primary">
                                    <th width="10px">Nro.</th>
                                    <th><i class="fa fa-user"></i> Nombre del usuario</th>
									<th><i class="fa fa-circle"></i> Cuenta de usuario</th>
									<th><i class="fa fa-suitcase"></i> Profesión</th>
                                    <th><i class="fa fa-gear"></i> Cargo</th>
									<th><i class="fa fa-cube"></i> Area</th>
									<th><i class="fa fa-lock"></i> Estado</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tfoot class="btn-primary">
                                <tr>
                                    <th width="10px">Nro.</th>
                                    <th><i class="fa fa-user"></i> Nombre del usuario</th>
                                    <th><i class="fa fa-circle"></i> Cuenta de usuario</th>
                                    <th><i class="fa fa-suitcase"></i> Profesión</th>
                                    <th><i class="fa fa-gear"></i> Cargo</th>
                                    <th><i class="fa fa-cube"></i> Area</th>
                                    <th><i class="fa fa-lock"></i> Estado</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
							</tfoot>
							<?php $cont = 1; ?>
                            <tbody>
                                @foreach($usuario as $item)
                                <tr>
                                    <td>{{ $cont++ }}</td>
                                    <td>{{ $item->us_nombre.' '.$item->us_paterno.' '.$item->us_materno }}</td>
                                    <td>{{ $item->us_cuenta }}</td>
                                    <td>{{ $item->idprofesion }}</td>
                                    <td>{{ $item->idcargo }}</td>
                                    <td>{{ $item->idcargo }}</td>
                                    <td>
										@if($item->us_estado)
										<b class="text-yellow"><i class="fa fa-unlock"></i> Habilitado</b>
										@else
										<b class="text-danger"><i class="fa fa-lock"></i> Inhabilitado</b>
										@endif
									</td>
                                    <td width="10px">
                                        @can('users.mostrar')
                                        <button type="button" onclick="detalleFunction({{ $item->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalVer"><i class="fa fa-eye"></i></button>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('users.editar')
                                        <a href="{{ route('users.editar', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
                    <h4 class="modal-title">Detalle de datos del usuario</h4>
                </div>
				<div class="modal-body" id="detalleUsuario">
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
		function detalleFunction(idUsuario){
            var _url = "{{ url('users')}}" + "/" + idUsuario;
            $.ajax({
                url: _url,
                dataType: 'html',
                success: function(data){
                    $("#detalleUsuario").html(data);
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