@extends('layouts.app')

@section('titulocontenido','Ficha Técnica')
@section('titulopreview','Criterios de Selección para la idea del proyecto')
@section('tituloform','Ficha Técnica')
@section('styles')	
    <link href="{{ asset('plugins/wizard/assets/css/paper-bootstrap-wizard.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/wizard/assets/css/demo.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/wizard/assets/css/themify-icons.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Criterios de Selección</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                     
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            <form action="" method="">
                                <div class="wizard-navigation">
                                    <div class="progress-with-circle">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 10%;"></div>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#pertinencia" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-user"></i>
                                                </div>
                                                Pertinencia
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#magnitud" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-settings"></i>
                                                </div>
                                                Magnitud
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#complejidad" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-settings"></i>
                                                </div>
                                                Complejidad
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#cobertura" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-map"></i>
                                                </div>
                                                Cobertura
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="pertinencia">
                                        @include('admin.fichatecnica.pertinencia.index')
                                    </div>
                                    <div class="tab-pane" id="magnitud">
                                        @include('admin.fichatecnica.magnitud.index')
                                    </div>
                                    <div class="tab-pane" id="complejidad">
                                        @include('admin.fichatecnica.complejidad.index')
                                    </div>
                                    <div class="tab-pane" id="cobertura">
                                        @include('admin.fichatecnica.cobertura.index')
                                        <!--<div class="row">
                                            <div class="col-sm-12">
                                                <h5 class="info-text"> Are you living in a nice area? </h5>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Street Name</label>
                                                    <input type="text" class="form-control" placeholder="5h Avenue">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Street Number</label>
                                                    <input type="text" class="form-control" placeholder="242">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" placeholder="New York...">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Country</label><br>
                                                    <select name="country" class="form-control">
                                                        <option value="Afghanistan"> Afghanistan </option>
                                                        <option value="Albania"> Albania </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Siguiente' />
                                        <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Terminar' />
                                    </div>
                    
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Anterior' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
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

    <script src="{{ asset('plugins/wizard/assets/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/wizard/assets/js/paper-bootstrap-wizard.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/wizard/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script>
        $("#lifichatecnica").addClass("active");
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
        $(document).ready(function() {
            // -- REGION --
            $('#click_andino').click(function (){
               var elemento = document.getElementById('andino').value;
               if(elemento == 0){
                   document.getElementById('andino').value = 1;
                   $('#mag_reg_andino').val('Andino');
               }else{
                   document.getElementById('andino').value = 0;
                   $('#mag_reg_andino').val('');
               }
            });
            $('#click_valle').click(function (){
                var elemento = document.getElementById('valle').value;
                if(elemento == 0){
                    document.getElementById('valle').value = 1;
                    $('#mag_reg_valle').val('Valle');
                }else{
                    document.getElementById('valle').value = 0;
                    $('#mag_reg_valle').val('');
                }
            });
            $('#click_chaco').click(function (){
                var elemento = document.getElementById('chaco').value;
                if(elemento == 0){
                    document.getElementById('chaco').value = 1;
                    $('#mag_reg_chaco').val('Chaco');
                }else{
                    document.getElementById('chaco').value = 0;
                    $('#mag_reg_chaco').val('');
                }
            });
            $('#click_chiquitania').click(function (){
                var elemento = document.getElementById('chiquitania').value;
                if(elemento == 0){
                    document.getElementById('chiquitania').value = 1;
                    $('#mag_reg_chiquitania').val('Chiquitania');
                }else{
                    document.getElementById('chiquitania').value = 0;
                    $('#mag_reg_chiquitania').val('');
                }
            });
            $('#click_amazonia').click(function (){
                var elemento = document.getElementById('amazonia').value;
                if(elemento == 0){
                    document.getElementById('amazonia').value = 1;
                    $('#mag_reg_amazonia').val('Amazonia');
                }else{
                    document.getElementById('amazonia').value = 0;
                    $('#mag_reg_amazonia').val('');
                }
            });
            // -- END REGION --
            // -- SUPERFICIE --
            $('#capa_proteccion').hide();
            $('#click_proteccion').click(function () {
                var elemento = document.getElementById('proteccion').value;
                if(elemento == 0) {
                    document.getElementById('proteccion').value = 1;
                    $('#mag_sup_proteccion').val('');
                    $('#capa_proteccion').show();
                }else{
                    document.getElementById('proteccion').value = 0;
                    $('#mag_sup_proteccion').val('');
                    $('#capa_proteccion').hide();
                }
            });

            $('#capa_silvicultura').hide();
            $('#click_silvicultura').click(function () {
                var elemento = document.getElementById('silvicultura').value;
                if(elemento == 0) {
                    document.getElementById('silvicultura').value = 1;
                    $('#mag_sup_silvicultura').val('');
                    $('#capa_silvicultura').show();
                }else{
                    document.getElementById('silvicultura').value = 0;
                    $('#mag_sup_silvicultura').val('');
                    $('#capa_silvicultura').hide();
                }
            });

            $('#capa_saff').hide();
            $('#click_saff').click(function () {
                var elemento = document.getElementById('saff').value;
                if(elemento == 0) {
                    document.getElementById('saff').value = 1;
                    $('#mag_sup_saff').val('');
                    $('#capa_saff').show();
                }else{
                    document.getElementById('saff').value = 0;
                    $('#mag_sup_saff').val('');
                    $('#capa_saff').hide();
                }
            });

            $('#capa_comercial').hide();
            $('#click_comercial').click(function () {
                var elemento = document.getElementById('comercial').value;
                if(elemento == 0) {
                    document.getElementById('comercial').value = 1;
                    $('#mag_sup_comercial').val('');
                    $('#capa_comercial').show();
                }else{
                    document.getElementById('comercial').value = 0;
                    $('#mag_sup_comercial').val('');
                    $('#capa_comercial').hide();
                }
            });

            // -- INVESTIGACION --
            // -- END INVESTIGACION --
        });
    </script>
@endsection