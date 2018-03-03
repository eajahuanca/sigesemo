<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="well well-lg">
                <?php error_reporting(0); ?>
                <h3>Documento de Cumplimiento Elegibilidad Legal</h3><br>
                <div class="row">
                    <div class="col-md-9">
                        <table>
                            <tr>
                                <td width="10%">
                                    <label>{{ Form::checkbox('ele_legal_check', null, null,['class' => 'flat-red']) }}</label>
                                    @if($errors->has('ele_legal_check'))
                                    <span style="color:red;">
                                        <strong>{{ $errors->first('ele_legal_check') }}</strong>
                                    </span>
                                    @endif
                                </td>
                                <td width="90%">
                                    {{ Form::file('ele_legal') }}
                                    @if($errors->has('ele_legal'))
                                    <span style="color:red;">
                                        <strong>{{ $errors->first('ele_legal') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>	
                    <div class="col-md-3">
                        @if($elegible->id && $elegible->ele_legal != '')
                        <a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Documento de respaldo legal"/></a>
                        @endif
                    </div>
                </div>
                                            
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('ele_obslegal')?' has-error':'' }}">
                            {{ Form::label('ele_obslegal', 'Observaciones generales') }}
                            {{ Form::textarea('ele_obslegal', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las observaciones sobre el cumplimiento de elegibilidad','rows' => 4]) }}
                            @if($errors->has('ele_obslegal'))
                                <span style="color:red;">
                                    <strong>{{ $errors->first('ele_obslegal') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>