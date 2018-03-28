<h3 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h3>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_infraestructura">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Infraestructura</p>
                </div>
                {!! Form::hidden('infraestructura',0,['id' => 'infraestructura']) !!}
                {!! Form::hidden('com_infraestructura',0,['id' => 'com_infraestructura']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_produccion">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Producción</p>
                </div>
                {!! Form::hidden('produccion',0,['id' => 'produccion']) !!}
                {!! Form::hidden('com_produccion',0,['id' => 'com_produccion']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_forestacion">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Forestación y Reforestación</p>
                </div>
                {!! Form::hidden('forestacion',0,['id' => 'forestacion']) !!}
                {!! Form::hidden('com_forestacion',0,['id' => 'com_forestacion']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_plantaciones">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Establecimiento de Plantaciones (mantenimiento)</p>
                </div>
                {!! Form::hidden('plantaciones',0,['id' => 'plantaciones']) !!}
                {!! Form::hidden('com_plantaciones',0,['id' => 'com_plantaciones']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_capacidades">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Fortalecimiento de Capacidades</p>
                </div>
                {!! Form::hidden('capacidades',0,['id' => 'capacidades']) !!}
                {!! Form::hidden('com_capacidades',0,['id' => 'com_capacidades']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_investigacion">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Investigación</p>
                </div>
                {!! Form::hidden('investigacion',0,['id' => 'investigacion']) !!}
                {!! Form::hidden('com_investigacion',0,['id' => 'com_investigacion']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_tecnologia">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Transferencia Tecnológica</p>
                </div>
                {!! Form::hidden('tecnologia',0,['id' => 'tecnologia']) !!}
                {!! Form::hidden('com_tecnologia',0,['id' => 'com_tecnologia']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox" id="click_manejo">
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Manejo de plantaciones forestales</p>
                </div>
                {!! Form::hidden('manejo',0,['id' => 'manejo']) !!}
                {!! Form::hidden('com_manejo',0,['id' => 'com_manejo']) !!}
            </div>
        </div>
    </div>
</div>