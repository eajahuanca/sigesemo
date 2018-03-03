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
                    <h3 class="box-title">Cumplimiento de Elegibilidad Técnica</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @include('fechas.fechaHora')
                    <div class="row">
                        @foreach($elegible as $item)
                        <hr style="border:1px dashed #4B6FEA; width:95%;"/>
                        <div class="row">
                            <div class="col-md-1">
                                @if($item->ele_estadotecnico == 'PENDIENTE')
                                <img src="{{ asset('plugins/login/img/pdfPendiente.png') }}" alt="">
                                @elseif($item->ele_estadotecnico == 'RECHAZADO')
                                <img src="{{ asset('plugins/login/img/pdfRechazado.png') }}" alt="">
                                @elseif($item->ele_estadotecnico == 'ACEPTADO')
                                <img src="{{ asset('plugins/login/img/pdfAceptado.png') }}" alt="">
                                @endif
                            </div>
                            <div class="col-md-11">
                                <div style="background:#E9E5E4;border-radius:6px;-webkit-border-radius:6px;moz-border-radius:6px;padding:12px 12px 12px 12px;margin-right:2em;margin-left:2em;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-yellow">Código C.U.S.: <b>{{ $item->documentos->cus }}</b>, Hoja de Ruta : <b>{{ $item->documentos->pre_sigechr }}</b></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <table>
                                                <tr>
                                                    <td>
                                                        @if($item->documentos->pre_nota)
                                                        <a href="{{ asset($item->documentos->pre_nota) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Nota de Solicitud <em>({{ $item->documentos->pre_nota_nombre }})</em></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if($item->documentos->pre_ficha)
                                                        <a href="{{ asset($item->documentos->pre_ficha) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Ficha Técnica <em>({{ $item->documentos->pre_ficha_nombre }})</em></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if($item->documentos->pre_legal)
                                                        <a href="{{ asset($item->documentos->pre_legal) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Doc. Responsable Legal <em>({{ $item->documentos->pre_legal_nombre }})</em></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-calendar"></i> <b>En fecha : </b><em>{{ fechaHora($item->documentos->updated_at) }}</em>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-gear"></i> <b>Observaciones : </b><em>{{ $item->documentos->pre_obs }}</em>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-gear"></i> <b>(Etapa Documentacion Previa)</b><em></em>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{ $item->ele_finanza }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> C.E. Financiera <em>({{ $item->ele_finanza_nombre }})</em></a><br>
                                                    <div class="text-left">
                                                        <i class="fa fa-calendar"></i> <b>En fecha : </b><em>{{ fechaHora($item->ele_finactualiza) }}</em><br>
                                                        <i class="fa fa-user"></i> <b>Por : </b><em>{{ $item->userActualizaFinanza->us_nombre.' '.$item->userActualizaFinanza->us_paterno.' '.$item->userActualizaFinanza->us_materno }}</em><br>
                                                        <b>Observaciones : </b><em>{{ $item->ele_obsfinanza }}</em>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    @if($item->ele_tecnica || $item->ele_obstecnica)
                                                        <a href="{{ $item->ele_tecnica }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> C.E. Técnica <em>({{ $item->ele_tecnica_nombre }})</em></a><br>
                                                        <div class="text-left">
                                                            <i class="fa fa-calendar"></i> <b>En fecha : </b><em>{{ fechaHora($item->ele_tecactualiza) }}</em><br>
                                                            <i class="fa fa-user"></i> <b>Por : </b><em>{{ $item->userActualizaTecnico->us_nombre.' '.$item->userActualizaTecnico->us_paterno.' '.$item->userActualizaTecnico->us_materno }}</em><br>
                                                            <b>Observaciones : </b><em>{{ $item->ele_obstecnica }}</em>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr style="border:1px solid green; width:95%;"/>
                                            <div class="row">
                                                <table class="pull-left">
                                                    <tr>
                                                        @if($item->ele_estadotecnico == 'PENDIENTE' && $item->ele_tecregistra == null)
                                                        <td style="padding-right:3px;">
                                                            @can('eletec.create')
                                                                <a href="{{ route('eletec.edit', $item->id) }}" class="btn btn-success btn-social"><i class="fa fa-check"></i> Aprobacíon Técnica</a>
                                                            @endcan
                                                        </td>
                                                        <td style="padding-right:3px;">
                                                            <a href="" class="btn btn-warning btn-social"><i class="fa fa-gear"></i> Modelo de Evaluación</a>
                                                        </td>
                                                        @endif
                                                        <td style="padding-right:3px;">
                                                            @can('eletec.show')
                                                                <button type="button" id="btnDetalle" class="btn btn-warning btn-social" data-toggle="modal" data-target="#modalVer" onclick="detalleFunction({{ $item->id }})"><i class="fa fa-eye"></i> Ver Detalle</button>
                                                            @endcan
                                                        </td>
                                                        @if($item->ele_estadotecnico == 'PENDIENTE' && $item->ele_tecregistra != null)
                                                        <td style="padding-right:3px;">
                                                            @can('eletec.edit')
                                                                <a href="{{ route('eletec.edit', $item->id) }}" class="btn btn-primary btn-social"><i class="fa fa-edit"></i> Editar</a>
                                                            @endcan
                                                        </td>
                                                        <td style="padding-right:3px;">
                                                            <a href="" class="btn btn-warning btn-social"><i class="fa fa-gear"></i> Modelo de Evaluación</a>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                </table>
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
                <div class="modal-body" id="detalleElegible">
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
        $("#lieletec").addClass("active");
        function detalleFunction(idelegible){
            var _url = "{{ url('elegible')}}" + "/" + idelegible;
            $.ajax({
                url: _url,
                dataType: 'html',
                success: function(data){
                    $("#detalleElegible").html(data);
                },
                error: function(e){
                    console.log('Error : ' + e);
                }
            });
        }
    </script>
@endsection