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
                                        <div class="row">
                                            <h5 class="info-text"> Please tell us more about yourself.</h5>
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="{{ asset('plugins/wizard/assets/img/default-avatar.jpg') }}" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input type="file" id="wizard-picture">
                                                    </div>
                                                    <h6>Choose Picture</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>First Name <small>(required)</small></label>
                                                    <input name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name <small>(required)</small></label>
                                                    <input name="lastname" type="text" class="form-control" placeholder="Smith...">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Email <small>(required)</small></label>
                                                    <input name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="complejidad">
                                        <h5 class="info-text"> What are you doing? (checkboxes) </h5>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Design">
                                                        <div class="card card-checkboxes card-hover-effect">
                                                            <i class="ti-paint-roller"></i>
                                                            <p>Design</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Code">
                                                        <div class="card card-checkboxes card-hover-effect">
                                                            <i class="ti-pencil-alt"></i>
                                                            <p>Code</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Develop">
                                                        <div class="card card-checkboxes card-hover-effect">
                                                            <i class="ti-star"></i>
                                                            <p>Develop</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="cobertura">
                                        <div class="row">
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
                                        </div>
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
    </script>
@endsection