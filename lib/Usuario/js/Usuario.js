/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function FormCrearUsuario() {

    var data;
    $.ajax({
        type: "POST",
        url: "lib/Usuario/Vista/CrearUsuario.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#cont_cod").html(data);
}


function VerAdminUsuarios() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Usuario/Vista/AdministrarUsuarios.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#cont_cod").html(data);
}

function AlmacenarUsuario() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Usuario/Control/UsuarioControl.php",
        async: false,
        data: {
            opcion: 'crear_usuario',
            nombres: $("#nombres").val(),
            apellidos: $("#apellidos").val(),
            correo: $("#correo").val(),
            identificacion_ibm: $("#identificacion_ibm").val(),
            cedula: $("#identificacion").val(),
            clave: $("#clave").val()
        },
        success: function (retu) {
            data = retu;
        }
    });


    if (data == "bien") {
        alert('Se ingreso correctamente el usuario');
        FormCrearUsuario();
    } else if (data == "mal") {
        alert('No se logro ingresar el usuario');
    } else if (data == "existe") {
        alert("El usuario ya existe");
    }
}


function GridUsuario() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Usuario/Control/UsuarioControl.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'AdministrarUsuario'
        },
        success: function (retu) {
            data = retu;
        }
    });

    return data;


}
