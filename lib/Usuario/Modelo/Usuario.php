<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author JuanCamilo
 */
include_once '../../config/BD.php';

class Usuario {

    public function CrearUsuario($data) {

        $obj_bd = new BD();
        $link = $obj_bd->conectar();

        $sql_revisa_usuarios = "SELECT id_empleado FROM empleado WHERE identificacion_ibm = '" . $data['identificacion_ibm'] . "'";

        $filas = $obj_bd->NumeroFilas($sql_revisa_usuarios, $link);

        if ($filas > 0) {

            return 'existe';
        } else {

            $clave = hash('sha512', $data['clave']);

            $arreglo_in = array(":nombres" => $data['nombres'],
                ":apellidos" => $data['apellidos'],
                ":cedula" => $data['cedula'],
                ":identificacion_ibm" => $data['identificacion_ibm'],
                ":correo_electronico" => $data['correo'],
                ":estado" => 'AC',
                ":clave" => $clave);


            //return var_dump($arreglo_in);

            $sql_insert = "INSERT INTO empleado(
            nombres,apellidos,cedula,identificacion_ibm,correo_electronico,estado,clave)
            VALUES(:nombres,:apellidos,:cedula,:identificacion_ibm,:correo_electronico,:estado,:clave);";

            $result = $link->prepare($sql_insert);
            $ejecucion = $result->execute($arreglo_in);

            if ($ejecucion) {
                return "bien";
            } else {
                return "mal";
            }
        }
    }

    public function AdministrarUsuario() {
        $arreglo_retorno = array();
        $obj_bd = new BD();
        $link = $obj_bd->conectar();


        $sql_admin_usuarios = "SELECT * FROM empleado";
        $resul = $obj_bd->ResultSet($sql_admin_usuarios, $link);

        foreach ($resul as $key => $value) {
            $arreglo_interior = array(utf8_encode($value['nombres']) . " " . utf8_encode($value['apellidos']),
                $value['correo_electronico'],
                $value['identificacion_ibm'],
                $value['cedula'],
                "<input type='button' value='Modificar' onclick='' class='btn btn-default'>
          <input type='button' value='Eliminar' onclick='' class='btn btn-default'>");
            array_push($arreglo_retorno, $arreglo_interior);
        }
        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function Login($data) {
        $obj_bd = new BD();
        $link = $obj_bd->conectar();

        $clave = hash('sha512', $data['clave']);

        $sql = "SELECT * FROM empleado 
               WHERE identificacion_ibm = '" . htmlspecialchars($data['identificacion_ibm']) . "'
               AND clave = '" . $clave . "' ";


        $numero_filas = $obj_bd->NumeroFilas($sql, $link);

        if ($numero_filas > 0) {//que paso ? paila audio
            $arreglo_usuario = $obj_bd->ResultSet($sql, $link);


            if ($arreglo_usuario[0]['estado'] == 'AC') {

                if ($arreglo_usuario[0]['identificacion_ibm'] == $data['identificacion_ibm'] && $arreglo_usuario[0]['clave'] == $clave) {

                    session_start();
                    $_SESSION['usuario'] = $arreglo_usuario[0];

                    header('Location: ../../../Aplicacion.php');
                } else {
                    return 3;
                }
            } else {
                return 2;
            }
        } else {
            return 3;
        }
    }

}
