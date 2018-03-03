<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$usuario = $_SESSION['usuario'];

if ($usuario['identificacion_ibm'] != NULL || $usuario['identificacion_ibm'] != '') {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <script src="js/jquery.js"></script>
            <link href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="css/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
            <link rel="stylesheet" href="css/app.css" type="text/css">
            <link rel="stylesheet" href="css/menu.css" type="text/css">
            <script src="js/jquery.dataTables.js"></script>
            <link rel="stylesheet" href="css/jquery.dataTables.css" type="text/css">

            <script src="lib/Usuario/js/Usuario.js"></script>
        </head>
        <body>
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container"> 
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                        </button>
                        <a target="_blank" href="#" class="navbar-brand"><img src="img/ibm_logo.png" style="width: 100px; height: 30px;"></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">           
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span> 
                                    <strong><?php echo $usuario['nombres'] . " " . $usuario['apellidos']; ?></strong>
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <p class="text-center">
                                                        <span class="glyphicon glyphicon-user icon-size"></span>
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="text-left"><strong><?php echo $usuario['nombres'] . " " . $usuario['apellidos']; ?></strong></p>
                                                    <p class="text-left small"><?php echo $usuario['identificacion_ibm']; ?></p>
    <!--                                                    <p class="text-left">
                                                        <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                                    </p>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        <a href="lib/cerrar_sesion.php" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container" style="margin-top: 100px;">
                <div class="row">
                     <div class="col-sm-3 col-md-3">
                        <div class="panel-group" id="accordion">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                                            </span>Usuarios</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <a href="#" onclick="FormCrearUsuario()">Añadir usuarios</a> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" onclick="VerAdminUsuarios()">Administracion de usuarios</a>
                                                </td>
                                            </tr>


                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-dashboard">
                                            </span>Administrar Horarios</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <a href="#" onclick="">Crear turno</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" onclick="">Asignar horario empleado</a> 
                                                </td>
                                            </tr>


                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-9">
                        <div class="well" id="cont_cod">
                            <h1>Gestion de horarios IBM</h1>
                            Sistema que permite el control y asignacion de horarios IBM
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </body>
    </html>
    <?php
} else {
    header('Location: index.php');
}
?>