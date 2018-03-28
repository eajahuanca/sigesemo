<h3 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h3>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
                <b class="info-text" style="font-size: 18px;">Región</b>
                <div class="row">
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_andino">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Andino</p>
                            </div>
                            {!! Form::hidden('andino',0,['id' => 'andino']) !!}
                            {!! Form::hidden('mag_reg_andino',0,['id' => 'mag_reg_andino']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_valle">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Valles</p>
                            </div>
                            {!! Form::hidden('valle',0,['id' => 'valle']) !!}
                            {!! Form::hidden('mag_reg_valle',0,['id' => 'mag_reg_valle']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_chaco">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Chaco</p>
                            </div>
                            {!! Form::hidden('chaco',0,['id' => 'chaco']) !!}
                            {!! Form::hidden('mag_reg_chaco',0,['id' => 'mag_reg_chaco']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_chiquitania">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Chiquitania</p>
                            </div>
                            {!! Form::hidden('chiquitania',0,['id' => 'chiquitania']) !!}
                            {!! Form::hidden('mag_reg_chiquitania',0,['id' => 'mag_reg_chiquitania']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_amazonia">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Amazonia</p>
                            </div>
                            {!! Form::hidden('amazonia',0,['id' => 'amazonia']) !!}
                            {!! Form::hidden('mag_reg_amazonia',0,['id' => 'mag_reg_amazonia']) !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
                <b class="info-text" style="font-size: 18px;">Superficie (HA)</b>
                <div class="row">

                    <!--PROTECCION-->
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_proteccion">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Protección Ambiental</p>
                            </div>
                            {!! Form::hidden('proteccion',0,['id' => 'proteccion']) !!}
                        </div>
                        <div class="input-group input-group-sm" id='capa_proteccion'>
                            {!! Form::text('mag_sup_proteccion',null,['class' => 'form-control text-right', 'id' => 'mag_sup_proteccion']) !!}
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">(Ha)</button>
                            </span>
                        </div>
                    </div>
                    <!--END PROTECCION-->
                    <!--SILVICULTURA-->
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_silvicultura">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Silvicultura Urbana</p>
                            </div>
                            {!! Form::hidden('silvicultura',0,['id' => 'silvicultura']) !!}
                        </div>
                        <div class="input-group input-group-sm" id='capa_silvicultura'>
                            {!! Form::text('mag_sup_silvicultura',null,['class' => 'form-control text-right', 'id' => 'mag_sup_silvicultura']) !!}
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">(Ha)</button>
                            </span>
                        </div>
                    </div>
                    <!--END SILVICULTURA-->
                    <!--SAFF-->
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_saff">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>SAFF-SSP</p>
                            </div>
                            {!! Form::hidden('saff',0,['id' => 'saff']) !!}
                        </div>
                        <div class="input-group input-group-sm" id='capa_saff'>
                            {!! Form::text('mag_sup_saff',null,['class' => 'form-control text-right', 'id' => 'mag_sup_saff']) !!}
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">(Ha)</button>
                            </span>
                        </div>
                    </div>
                    <!--END SAFF-->
                    <!--COMERCIAL-->
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_comercial">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Comercial</p>
                            </div>
                            {!! Form::hidden('comercial',0,['id' => 'comercial']) !!}
                        </div>
                        <div class="input-group input-group-sm" id='capa_comercial'>
                            {!! Form::text('mag_sup_comercial',null,['class' => 'form-control text-right', 'id' => 'mag_sup_comercial']) !!}
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">(Ha)</button>
                            </span>
                        </div>
                    </div>
                    <!--END COMERCIAL-->
                    <!--GLOBAL-->
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_global">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Global</p>
                            </div>
                            {!! Form::hidden('global',0,['id' => 'global']) !!}
                        </div>
                        <div class="input-group input-group-sm" id='capa_global'>
                            {!! Form::text('mag_sup_global',null,['class' => 'form-control text-right', 'id' => 'mag_sup_global']) !!}
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">(Ha)</button>
                            </span>
                        </div>
                    </div>
                    <!--END GLOBAL-->
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
                <b class="info-text" style="font-size: 18px;">Investigación</b>
                <div class="row">
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_basica">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Básica</p>
                            </div>
                            {!! Form::hidden('basica',0,['id' => 'basica']) !!}
                            {!! Form::hidden('mag_inv_basica',0,['id' => 'mag_inv_basica']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox" id="click_aplicada">
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Aplicada</p>
                            </div>
                            {!! Form::hidden('aplicada',0,['id' => 'aplicada']) !!}
                            {!! Form::hidden('mag_inv_aplicada',0,['id' => 'mag_inv_aplicada']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>