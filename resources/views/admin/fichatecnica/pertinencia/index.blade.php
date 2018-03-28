<!--<div class="row">
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
</div>-->
<h3 class="info-text"> Seleccione una de las opciones que se visualizan a continuación</h3>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox">
                {!! Form::checkbox('per_nombre[]','Agenda 2025') !!}
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>Agenda 2025</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox">
                {!! Form::checkbox('per_nombre[]', 'PDES') !!}
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>PDES</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox">
                {!! Form::checkbox('per_nombre[]', 'PSDI') !!}
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>PSDI</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox">
                {!! Form::checkbox('per_nombre[]', 'PEI') !!}
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>PEI</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox">
                {!! Form::checkbox('per_nombre[]', 'NORMATIVA DEL SECTOR') !!}
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>NORMATIVA DEL SECTOR</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox">
                {!! Form::checkbox('per_nombre[]', 'GUIA') !!}
                <div class="card card-checkboxes card-hover-effect">
                    <i class="ti-pencil-alt"></i>
                    <p>GUIA</p>
                </div>
            </div>
        </div>
    </div>
</div>