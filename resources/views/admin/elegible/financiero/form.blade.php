<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="well well-lg">
            <?php error_reporting(0); ?>
            <h3>Documento de Cumplimiento Elegibilidad Financiera</h3><br>
            <div class="row">
                <div class="col-md-9">
                    <table>
                        <tr>
                            <td width="10%">
                                <label>{{ Form::checkbox('ele_finanza_check', null, null,['class' => 'flat-red']) }}</label>
                                @if($errors->has('ele_finanza_check'))
                                <span style="color:red;">
                                    <strong>{{ $errors->first('ele_finanza_check') }}</strong>
                                </span>
                                @endif
                            </td>
                            <td width="90%">
                                {{ Form::file('ele_finanza') }}
                                @if($errors->has('ele_finanza'))
                                <span style="color:red;">
                                    <strong>{{ $errors->first('ele_finanza') }}</strong>
                                </span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>	
                <div class="col-md-3">
                    @if($elegible->id && $elegible->ele_tecnica != '')
                    <a href="" target="_blank"><img src="{{ asset('plugins/login/img/pdfpng.png') }}" alt="Nota de Solicitud"/></a>
                    @endif
                </div>
            </div>
                                        
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('ele_obsfinanza')?' has-error':'' }}">
                        {{ Form::label('ele_obsfinanza', 'Observaciones generales') }}
                        {{ Form::textarea('ele_obsfinanza', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las observaciones sobre el cumplimiento de elegibilidad','rows' => 4]) }}
                        @if($errors->has('ele_obsfinanza'))
                            <span style="color:red;">
                                <strong>{{ $errors->first('ele_obsfinanza') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            {{ Form::hidden('iddocumento', $id)}}
        </div>
    </div>
    <div class="col-md-1"></div>
</div>