@extends('layouts.app')

@section('titulocontenido','Cumplimiento de Elegibilidad')
@section('titulopreview','Documentos previos cargados en el sistema para cumplimiento de elegibilidad')
@section('tituloform','Elegibilidad')
@section('styles')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Cumplimiento de Elegibilidad Financiera</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @include('fechas.fechaHora')
                    <div class="row">
                        @foreach($documento as $item)
                        <div class="col-md-12">
                            <hr style="border:1px dashed #4B6FEA; width:95%;"/>
                            <?php 
                                $elegible = App\Elegible::find($item->id);
                            ?>
                            <div class="row">
                                <div class="col-md-1">
                                    @if($elegible != null)
                                        @if($elegible['ele_estadofinanza'] == 'ACEPTADO')
                                        <img src="{{ asset('plugins/login/img/pdfAceptado.png') }}" alt="">
                                        @elseif($elegible['ele_estadofinanza'] == 'PENDIENTE')
                                        <img src="{{ asset('plugins/login/img/pdfPendiente.png') }}" alt="">
                                        @elseif($elegible['ele_estadofinanza'] == 'RECHAZADO')
                                        <img src="{{ asset('plugins/login/img/pdfRechazado.png') }}" alt="">
                                        @endif
                                    @else
                                        <img src="{{ asset('plugins/login/img/pdfRechazado.png') }}" alt="sin valor" title="sin valor">
                                    @endif
                                </div>
                                <div class="col-md-11">
                                    <div style="background:#E9E5E4;border-radius:6px;-webkit-border-radius:6px;moz-border-radius:6px;padding:12px;margin:-0.3em 0em 1em 0em;">
                                        <div class="row">
                                            <div class="col-md-4 text-right">
                                                @if($item->pre_nota)
                                                    <a href="{{ asset($item->pre_nota) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Nota de Solicitud <em>({{ $item->pre_nota_nombre }})</em></a>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-right">
                                                @if($item->pre_ficha)
                                                <a href="{{ asset($item->pre_ficha) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Ficha Técnica <em>({{ $item->pre_ficha_nombre }})</em></a>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-right">
                                                @if($item->pre_legal)
                                                <a href="{{ asset($item->pre_legal) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Doc. Responsable Legal <em>({{ $item->pre_legal_nombre }})</em></a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 text-right">
                                                @if($elegible['ele_finanza'])
                                                    <a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> C.E. Financiera <em>({{ $elegible->ele_finanza_nombre }})</em></a><br>
                                                    <div class="text-left">
                                                        <i class="fa fa-user"></i> <b>Por : </b><em>{{ $elegible->userActualizaFinanza->us_nombre.' '.$elegible->userActualizaFinanza->us_paterno.' '.$elegible->userActualizaFinanza->us_materno }}</em><br>
                                                        <em><b>Observaciones : </b>{{ $elegible->ele_obsfinanza }}</em>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-right">
                                                @if($item->pre_ficha)
                                                <a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> C.E. Técnica <em>({{ $item->pre_ficha_nombre }})</em></a><br>
                                                <em><b>Observaciones : </b>algo de obs</em>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-right">
                                                @if($item->pre_legal)
                                                <a href="{{ asset($item->pre_legal) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> C.E. Legal <em>({{ $item->pre_legal_nombre }})</em></a><br>
                                                <em><b>Observaciones : </b>algo de obs</em>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-yellow">Código C.U.S.: <b>{{ $item->cus }}</b>, Hoja de Ruta : <b>{{ $item->pre_sigechr }}</b></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <br>
                                                <table class="pull-right">
                                                    <tr>
                                                        <td style="padding-right:3px;">
                                                            @can('elefin.show')
                                                                <button type="button" id="btnDetalle" class="btn btn-sm btn-warning btn-social" data-toggle="modal" data-target="#modalVer" onclick="detalleFunction({{ $item->id }})"><i class="fa fa-eye"></i> Ver Detalle</button>
                                                            @endcan
                                                        </td>
                                                        <td style="padding-right:3px;">
                                                            @if($item->pre_estado == 'PENDIENTE')
                                                            @can('elefin.edit')
                                                                <a href="{{ route('elefin.edit', $item->id) }}" class="btn btn-sm btn-primary btn-social"><i class="fa fa-edit"></i> Editar</a>
                                                            @endcan
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="fa fa-user"></i> <b>Por : </b><em>{{ $item->userActualiza->us_nombre.' '.$item->userActualiza->us_paterno.' '.$item->userActualiza->us_materno }}</em>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <i class="fa fa-calendar"></i> <b>En fecha : </b><em>{{ fechaHora($item->updated_at) }}</em>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <i class="fa fa-gear"></i> <b>Observaciones : </b><em>{{ $item->pre_obs }}</em>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <i class="fa fa-gear"></i> <b>Estado : </b><em>@if($item->pre_estado == 'ACEPTADO'){{ $item->pre_estado.', (Etapa Documentación Previa)' }} @endif</em>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                <div class="modal-body" id="detallePreviou">
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
        $("#liprevious").addClass("active");
        function detalleFunction(idPrevious){
            var _url = "{{ url('previous')}}" + "/" + idPrevious;
            $.ajax({
                url: _url,
                dataType: 'html',
                success: function(data){
                    $("#detallePreviou").html(data);
                },
                error: function(e){
                    console.log('Error : ' + e);
                }
            });
        }
    </script>
@endsection