@extends('layouts.app')

@section('titulocontenido','Ficha Técnica')
@section('titulopreview','En esta sección se observan a las fichas técnicas registradas')
@section('tituloform','Ficha Técnica')
@section('styles')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ficha Técnica</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @include('fechas.fechaHora')
                    <div class="row">
                        @foreach($documento as $item)
                        <?php
                            error_reporting(0);
                            $ficha = App\Fichatecnica::where('iddocumentos','=',$item->id)->first();
                        ?>
                        <hr style="border:1px dashed #4B6FEA; width:95%;"/>
                        <div class="row">
                            <div class="col-md-1">
                                @if($ficha)
                                <img src="{{ asset('plugins/login/img/pdfFicha.png') }}" alt="sin valor" title="Ficha Técnica Generada">
                                @else
                                <img src="{{ asset('plugins/login/img/pdfSinFicha.png') }}" alt="sin valor" title="Por Generar Ficha">
                                @endif
                            </div>
                            <div class="col-md-11">
                                <div style="background:#E9E5E4;border-radius:6px;-webkit-border-radius:6px;moz-border-radius:6px;padding:12px 12px 12px 12px;margin-right:2em;margin-left:2em;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-yellow">Código C.U.S.: <b>{{ $item->cus }}</b>, Hoja de Ruta : <b>{{ $item->pre_sigechr }}</b></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <table>
                                                <tr>
                                                    <td>
                                                        @if($item->pre_nota)
                                                        <a href="{{ asset($item->pre_nota) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Nota de Solicitud <em>({{ $item->pre_nota_nombre }})</em></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if($item->pre_ficha)
                                                        <a href="{{ asset($item->pre_ficha) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Ficha Técnica <em>({{ $item->pre_ficha_nombre }})</em></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if($item->pre_legal)
                                                        <a href="{{ asset($item->pre_legal) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> Doc. Responsable Legal <em>({{ $item->pre_legal_nombre }})</em></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-calendar"></i> <b>En fecha : </b><em>{{ fechaHora($item->updated_at) }}</em>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-gear"></i> <b>Observaciones : </b><em>{{ $item->pre_obs }}</em>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-gear"></i> <b>Estado : </b><em>@if($item->pre_estado == 'ACEPTADO'){{ $item->pre_estado.', (Etapa Documentación Previa)' }} @endif</em>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($ficha)
                                                        <a href="{{ $ficha->id }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}"/> FICHA TECNICA </a><br>
                                                        <div class="text-left">
                                                            <i class="fa fa-calendar"></i> <b>Generado en fecha : </b><em>{{ fechaHora($ficha->created_at) }}</em><br>
                                                            <i class="fa fa-user"></i> <b>Por : </b><em>{{ $ficha->userActualiza->us_nombre.' '.$ficha->userActualiza->us_paterno.' '.$ficha->userActualiza->us_materno }}</em><br>
                                                            <b>Observaciones generales : </b><em>{{ $ficha->cob_observaciones }}</em>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr style="border:1px solid green; width:95%;"/>
                                            @if(!$ficha)
                                            <div class="row">
                                                <table class="pull-left">
                                                    <tr>
                                                        <td style="padding-right:3px;">
                                                            @can('ficha.create')
                                                                <a href="{{ route('ficha.create', $item->id) }}" class="btn btn-success btn-social"><i class="fa fa-file-pdf-o"></i> Generar Ficha Técnica</a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @endif
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
        $("#lifichatecnica").addClass("active");
    </script>
@endsection