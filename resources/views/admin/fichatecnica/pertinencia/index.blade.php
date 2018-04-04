<h3 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h3>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <label>{{ Form::checkbox('pertinencia[]', 'Agenda 2025', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Agenda 2025' !!}
            </label>
        </div>
        <div class="col-sm-4">
            <label>{{ Form::checkbox('pertinencia[]', 'PDES', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                &nbsp;&nbsp;&nbsp;{!! 'PDES' !!}
            </label>
        </div>
        <div class="col-sm-4">
            <label>{{ Form::checkbox('pertinencia[]', 'PSDI', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                &nbsp;&nbsp;&nbsp;{!! 'PSDI' !!}
            </label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <label>{{ Form::checkbox('pertinencia[]', 'PEI', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                &nbsp;&nbsp;&nbsp;{!! 'PEI' !!}
            </label>
        </div>
        <div class="col-sm-4">
            <label>{{ Form::checkbox('pertinencia[]', 'NORMATIVA DEL SECTOR', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                &nbsp;&nbsp;&nbsp;{!! 'Normativa del Sector' !!}
            </label>
        </div>
        <div class="col-sm-4">
            <label>{{ Form::checkbox('pertinencia[]', 'GUIA', null,['class' => 'flat-red', 'id' => 'pre_programa']) }}
                &nbsp;&nbsp;&nbsp;{!! 'GUIA' !!}
            </label>
        </div>
    </div>
</div>