<h4 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h4>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
                <b class="info-text" style="font-size: 18px;">Región</b><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_region[]', 'Andino', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Andino' !!}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_region[]', 'Valle(s)', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Valle(s)' !!}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_region[]', 'Chaco', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Chaco' !!}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_region[]', 'Chiquitania', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Chiquitania' !!}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_region[]', 'Amazonia', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Amazonia' !!}
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
                <b class="info-text" style="font-size: 18px;">Superficie (HA)</b><br><br>
                <div class="row">
                    <!--PROTECCION-->
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_superficie[]', 'Protección Ambiental', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Protección Ambiental' !!}
                        </label>
                    </div>
                    <!--END PROTECCION-->
                    <!--SILVICULTURA-->
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_superficie[]', 'Silvicultura Urbana', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Silvicultura Urbana' !!}
                        </label>
                    </div>
                    <!--END SILVICULTURA-->
                    <!--SAFF-->
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_superficie[]', 'SAFF-SSP', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'SAFF-SSP' !!}
                        </label>
                    </div>
                    <!--END SAFF-->
                    <!--COMERCIAL-->
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_superficie[]', 'Comercial', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Comercial' !!}
                        </label>
                    </div>
                    <!--END COMERCIAL-->
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
                <b class="info-text" style="font-size: 18px;">Investigación</b><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_investigacion[]', 'Básica', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Básica' !!}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label>{{ Form::checkbox('mag_investigacion[]', 'Aplicada', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                            &nbsp;&nbsp;&nbsp;{!! 'Aplicada' !!}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div style="border:2px dotted green;padding: 1.5em 1.2em 0em 1.2em;border-radius:4px;">
            <b class="info-text" style="font-size: 18px;">Contribución a las metas (ha)</b><br><br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_suplapaz', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) La Paz</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_suporuro', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Oruro</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_suppotosi', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Potosi</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_supcochabamba', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Cochabamba</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_supsantacruz', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Santa Cruz</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_supbeni', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Beni</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_suppando', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Pando</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_suptarija', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Tarija</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_supchuquisaca', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Chuquisaca</a>
                        </div>                
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {!! Form::text('mag_supnacional', null,['class' => 'form-control text-right', 'placeholder' => '0.00']) !!}
                        <div class="input-group-btn">
                            <a class="btn btn-primary btn-sm">(Ha) Nacional</a>
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>