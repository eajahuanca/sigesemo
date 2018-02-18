@include('fechas.fechaHora')
<div class="row">
    <div class="col-md-12">
		<center><img class="img-circle" src="{{ asset($usuario->us_imagen) }}"/></center>
        <table class="table table-bordered table-striped">
			<tr>
				<td><b>Nro. de Documento</b></td>
				<td>{{ $usuario->us_carnet.' - '.$usuario->us_expedido }}</td>
			</tr>
			<tr>
                <td><b>Nombre Completo</b></td>
                <td>{{ $usuario->us_nombre.' '.$usuario->us_paterno.' '.$usuario->us_materno }}</td>
            </tr>
            <tr>
                <td><b>Género</b></td>
                <td>{{ $usuario->us_genero }}</td>
			</tr>
			<tr>
				<td><b>Teléfono/Celular</b></td>
				<td>{{ $usuario->us_telefono }}</td>
			</tr>
            <tr>
                <td><b>Cuenta de usuario</b></td>
                <td>{{ $usuario->us_cuenta }}</td>
			</tr>
			<tr>
				<td><b>Correo Electrónico</b></td>
				<td>{{ $usuario->email }}</td>
			</tr>
            <tr>
                <td><b>Fecha de Registro</b></td>
                <td>{{ fechaHora($usuario->created_at) }}</td>
            </tr>
            <tr>
                <td><b>Fecha de Actualización</b></td>
                <td>{{ fechaHora($usuario->updated_at) }}</td>
			</tr>
			<tr>
				<td><b>Observaciones</b></td>
				<td>{{ $usuario->us_observaciones }}</td>
			</tr>
        </table>
    </div>
</div>