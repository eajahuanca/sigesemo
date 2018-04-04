<h3 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h3>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_infraesctutura', 'Infraestructura', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Infraestructura' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_produccion', 'Producción', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Producción' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_forestacion', 'Forestación y Reforestación', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Forestación' !!}
            </label>
        </div>
        <br><br>
        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_plantaciones', 'Establecimiento de Plantaciones', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Establecimiento de Plantaciones' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_capacidades', 'Fortalecimiento de Capacidades', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Fortalecimiento de Capacidades' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_investigacion', 'Investigación', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Investigación' !!}
            </label>
        </div>

        <br><br>
        
        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_tecnologia', 'Transferencia Tecnológica', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Transferencia Tecnológica' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('com_manejo', 'Manejo de Plantaciones Forestales', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Manejo de Plantaciones Forestales' !!}
            </label>
        </div>
    </div>
</div>