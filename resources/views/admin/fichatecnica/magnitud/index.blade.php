<h3 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h3>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
                <b class="info-text" style="font-size: 18px;">Región</b>
                <div class="row">
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox">
                            {!! Form::checkbox('mag_reg_andino','Andino') !!}
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Andino</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox">
                            {!! Form::checkbox('mag_reg_valle','Valles') !!}
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Valles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox">
                            {!! Form::checkbox('mag_reg_chaco','Chaco') !!}
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Chaco</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox">
                            {!! Form::checkbox('mag_reg_chiquitania','Chiquitania') !!}
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Chiquitania</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox">
                            {!! Form::checkbox('mag_reg_amazonia','Amazonia') !!}
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Amazonia</p>
                            </div>
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
                            <input type="text" name="xxx" value="" hidden="true"/>
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
                        <div class="choice" data-toggle="wizard-checkbox">
                            {!! Form::checkbox('mag_inv_basica','Basica') !!}
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Básica</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="choice" data-toggle="wizard-checkbox">
                            {!! Form::checkbox('mag_inv_aplicada','Aplicada') !!}
                            <div class="card card-checkboxes card-hover-effect">
                                <i class="ti-pencil-alt"></i>
                                <p>Aplicada</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>