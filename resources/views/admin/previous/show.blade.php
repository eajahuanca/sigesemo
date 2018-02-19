@include('fechas.fechaHora')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped">
            <tr>
                <td><b>Código C.U.S.</b></td>
                <td>{{ $previous->cus }}</td>
			</tr>
            <tr>
                <td><b>Hoja de Ruta SIGEC</b></td>
                <td>{{ $previous->pre_sigechr }}</td>
			</tr>
			<tr>
				<td><b>Departamento</b></td>
				<td>{{ $previous->pre_depto}}</td>
			</tr>
            <tr>
				<td><b>Entidad</b></td>
				<td>{{ $previous->entidades->ent_nombre }}</td>
			</tr>
            <tr>
                <td><b>Registrado Por</b></td>
                <td>{{ $previous->userRegistra->us_nombre.' '.$previous->userRegistra->us_paterno.' '.$previous->userRegistra->us_materno }}</td>
			</tr>
			<tr>
				<td><b>Actualizado Por</b></td>
				<td>{{ $previous->userActualiza->us_nombre.' '.$previous->userActualiza->us_paterno.' '.$previous->userActualiza->us_materno }}</td>
			</tr>
            <tr>
                <td><b>Observaciones</b></td>
                <td>{{ $previous->pre_obs }}</td>
            </tr>
            <tr>
                <td><b>Fecha de Registro</b></td>
                <td>{{ fechaHora($previous->created_at) }}</td>
            </tr>
            <tr>
                <td><b>Fecha de Actualización</b></td>
                <td>{{ fechaHora($previous->updated_at) }}</td>
            </tr>
        </table>
    </div>
</div>