@extends('layouts.app')

@section('titulocontenido','Roles de usuario')
@section('titulopreview','Roles registrados en el sistema')
@section('tituloform','Roles')
@section('styles')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles de usuario</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @can('roles.create')
                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary btn-social">
                        <i class="fa fa-plus-square"></i> Nuevo Rol
                    </a>
                    @endcan
                    <br>
                    <div style="border:1px solid #EAE9E8;padding:2px;border-radius:7px;-webkit-border-radius:7px;-moz-border-radius:7px;margin-top:5px;">
                        <div class="row">
                            @foreach($roles as $role)
                            <div class="col-md-6">
                                <div class="box box-widget widget-user-2">
                                    <div class="widget-user-header">
                                        <div class="widget-user-image">
                                            <img class="img-circle" src="{{ asset('plugins/login/img/permisos.png') }}" alt="Rol">
                                        </div>
                                        <h3 class="widget-user-username text-yellow"><i class="fa fa-user"></i> {{ $role->name }}</h3>
                                        <h5 class="widget-user-desc"><i class="fa fa-th-large"></i> {{ $role->description }}</h5>
                                        <ul class="nav nav-stacked">
                                            <li>
                                                <div class="pull-right">
                                                    <table>
                                                        <tr>
                                                            <td style="padding-right:3px;">
                                                                @can('roles.show')
                                                                    <button type="button" id="btnDetalle" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalVer" onclick="detalleFunction({{ $role->id }})"><i class="fa fa-eye"></i></button>
                                                                @endcan
                                                            </td>
                                                            <td style="padding-right:3px;">
                                                                @can('roles.edit')
                                                                    @if($role->id != 1)
                                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                                    @endif
                                                                @endcan
                                                            </td>
                                                            <td style="padding-right:3px;">
                                                                @can('roles.destroy')
                                                                    @if($role->id != 1)
                                                                        {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                                                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                                        {!! Form::close() !!}
                                                                    @endif
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
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
                    <h4 class="modal-title">Detalle del Rol</h4>
                </div>
                <div class="modal-body" id="detalleRol">
                </div>
                <div class="modal-footer bg-yellow">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $("#liparametrizacion").addClass("treeview active");
        function detalleFunction(idRol){
            var _url = "{{ url('roles')}}" + "/" + idRol;
            $.ajax({
                url: _url,
                dataType: 'html',
                success: function(data){
                    $("#detalleRol").html(data);
                },
                error: function(e){
                    console.log('Error : ' + e);
                }
            });
        }
    </script>
@endsection