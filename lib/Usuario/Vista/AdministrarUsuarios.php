<table id="tabla_admin_usuarios"  class="table-bordered" class="display" >
    <thead>
        <tr>

            <th>NOMBRE COMPLETO</th>
            <th>CORREO</th>
            <th>IDENTIFICACION IBM</th>
            <th>CEDULA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>


<script>


    var json = GridUsuario();

    $(document).ready(function () {
        $('#tabla_admin_usuarios').DataTable({
            data: json
        });
    });

</script>