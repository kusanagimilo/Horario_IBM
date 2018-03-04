<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery.js"></script>
        <link href="css/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
        <script src="css/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <link href="css/index.css" rel="stylesheet">
    </head>
    <body>

        <!------ Include the above in your HEAD tag ---------->

        <div class="container">

            <div class="col-md-10 col-md-offset-1 main" >
                <div class="col-md-6 left-side" >
                    <h3>IBM</h3>
                    <p>Ingrese a la aplicacion para ver horarios asignados, asignar horarios y crear empleados IBM
                    ACA TENEMOS MAS CAMBIOS</p>
                    <br>


                </div><!--col-sm-6-->

                <div class="col-md-6 right-side">
                    <h3>Ingreso</h3>

                    <!--Form with header-->
                    <form class="form"  action="lib/Usuario/Control/UsuarioControl.php" autocomplete="on" method="POST">
                        <div class="form-group">
                            <label for="form2">Ingrese su ID IBM</label>
                            <input type="text" required="" id="form2" name="identificacion_ibm" class="form-control input-lg">

                        </div>

                        <div class="form-group">
                            <label for="form4">Ingrese su contraseña</label>
                            <input type="password" required="" id="clave" name="clave" class="form-control input-lg">

                        </div>

                        <input type="hidden" name="opcion" id="opcion" value="LogIn">

                        <div class="text-xs-center">
                            <button type="submit" class="btn btn-deep-purple">Ingresar</button>
                        </div>
                    </form>

                    <!--/Form with header-->

                </div><!--col-sm-6-->


            </div><!--col-sm-8-->

        </div><!--container-->
    </body>
</html>


