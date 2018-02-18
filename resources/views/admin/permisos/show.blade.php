@include('fechas.fechaHora')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped">
            <tr>
                <td><b>Nombre del Rol</b></td>
                <td>{{ $permiso->name }}</td>
            </tr>
            <tr>
                <td><b>Slug</b></td>
                <td>{{ $permiso->slug }}</td>
            </tr>
            <tr>
                <td><b>Descripción</b></td>
                <td>{{ $permiso->description }}</td>
            </tr>
            <tr>
                <td><b>Fecha de Registro</b></td>
                <td>{{ fechaHora($permiso->created_at) }}</td>
            </tr>
            <tr>
                <td><b>Fecha de Actualización</b></td>
                <td>{{ fechaHora($permiso->updated_at) }}</td>
            </tr>
        </table>
    </div>
</div>