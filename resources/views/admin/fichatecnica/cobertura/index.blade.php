<h3 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h3>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'La Paz', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'La Paz' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Oruro', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Oruro' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Potosi', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Potosi' !!}
            </label>
        </div>
        <br><br>
        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Beni', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Beni' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Pando', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Pando' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Santa Cruz', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Santa Cruz' !!}
            </label>
        </div>
        <br><br>
        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Tarija', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Tarija' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Chuquisaca', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Chuquisaca' !!}
            </label>
        </div>

        <div class="col-sm-4">
            <label>{{ Form::checkbox('cob_deptos[]', 'Cochabamba', null,['class' => 'flat-red']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Cochabamba' !!}
            </label>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="row">
            <div class="col-md-4">
                {!! Form::label('cob_municipio_total', 'Municipio(s)', ['class' => 'pull-right']) !!}
            </div>
            <div class="col-md-2 input-group-sm">
                {!! Form::text('cob_municipio_total', null, ['class' => 'form-control text-right', 'placeholder' => '(Ejemplo: 15)']) !!}            
            </div>
            <div class="col-md-2 input-group-sm">
                {!! Form::text('cob_municipio_abarca', null, ['class' => 'form-control text-right', 'placeholder' => '(Ejemplo: 7)']) !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                {!! Form::label('cob_comunidad_total', 'Comunidad(es)', ['class' => 'pull-right']) !!}
            </div>
            <div class="col-md-2 input-group-sm">
                {!! Form::text('cob_comunidad_total', null, ['class' => 'form-control text-right', 'placeholder' => '(Ejemplo: 15)']) !!}
            </div>
            <div class="col-md-2 input-group-sm">
                {!! Form::text('cob_comunidad_abarca', null, ['class' => 'form-control text-right', 'placeholder' => '(Ejemplo: 7)']) !!}
            </div>
        </div>
    </div>
</div>