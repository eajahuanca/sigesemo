@extends('layouts.app')

@section('titulocontenido','Documentación previa')
@section('titulopreview','Documentos previos cargados en el sistema')
@section('tituloform','Documentos')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Reporte de Datos de Documentos Presentados</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="piechart1" style="width: 100%; height: 500px;"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="piechart2" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('plugins/graficos/loader.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <script>
        $("#lipiechart").addClass("active");

        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.8
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.5).get('rgb')]
                    ]
                };
            })
        });
        Highcharts.chart('piechart1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Programas de Proyecto'
            },
            subtitle: {
                text: 'Gráfica de las Documentaciones previas (solicitudes) presentadas según programas'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Porcentaje Estimado',
                colorByPoint: true,
                data: [
                    @foreach ($programa as $itemPro)
                        {
                            name: "{{ $itemPro->pre_programa }}",
                            y: {{ $itemPro->total }},
                            drilldown: "{{ $itemPro->pre_programa }}"
                        },
                    @endforeach
                ]
            }]//aqui va el drilldown
        });
        Highcharts.chart('piechart2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Aceptados | Pendientes | Rechazados'
            },
            subtitle: {
                text: 'Gráfica de las Documentaciones previas (solicitudes) presentadas'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Porcentaje Estimado',
                colorByPoint: true,
                data: [
                    @foreach ($estado as $item)
                        {
                            name: "{{ $item->pre_estado }}",
                            y: {{ $item->total }},
                            drilldown: "{{ $item->pre_estado }}"
                        },
                    @endforeach
                ]
            }],
            drilldown:{
                series:[
                    {
                        name:'ACEPTADO',
                        id: 'ACEPTADO',
                        data: [
                            @foreach($aceptado as $itemA )
                                ['{{ $itemA->pre_depto }}', {{ $itemA->total }}],
                            @endforeach
                        ]
                    },
                    {
                        name:'PENDIENTE',
                        id: 'PENDIENTE',
                        data: [
                            @foreach($pendiente as $itemP )
                                ['{{ $itemP->pre_depto }}', {{ $itemP->total }}],
                            @endforeach
                        ]
                    },
                    {
                        name:'RECHAZADO',
                        id: 'RECHAZADO',
                        data: [
                            @foreach($rechazado as $itemR )
                                ['{{ $itemR->pre_depto }}', {{ $itemR->total }}],
                            @endforeach
                        ]
                    }
                ]
            }
        });
   
    </script>
@endsection