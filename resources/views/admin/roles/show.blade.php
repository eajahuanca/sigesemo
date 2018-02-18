@include('fechas.fechaHora')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped">
            <tr>
                <td><b>Nombre del Rol</b></td>
                <td>{{ $role->name }}</td>
            </tr>
            <tr>
                <td><b>Slug</b></td>
                <td>{{ $role->slug }}</td>
            </tr>
            <tr>
                <td><b>Descripción</b></td>
                <td>{{ $role->description }}</td>
            </tr>
            <tr>
                <td><b>Fecha de Registro</b></td>
                <td>{{ fechaHora($role->created_at) }}</td>
            </tr>
            <tr>
                <td><b>Fecha de Actualización</b></td>
                <td>{{ fechaHora($role->updated_at) }}</td>
            </tr>
        </table>
    </div>
</div>