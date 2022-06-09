<?php

    require_once "../../../clases/Usuario.php";

    $password = sha1($_POST['txtPassword']);
    $fechaNacimiento = explode("-", $_POST['txtFecha']);
    $fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];

    $datos = array(
        "nombre" => $_POST['txtNombre'] ,
        "apaterno" => $_POST['txtApaterno'] ,
        "materno" => $_POST['txtMaterno'] ,
        "fecha" => $fechaNacimiento ,
        "email" => $_POST['txtEmail']  ,
        "usuario" => $_POST['txtUsuario'] ,
        "password" => $password
    );

    $usuario = new Usuario();
    echo $usuario -> agregarUsuario($datos);
    
    
    
    //echo "si paso la información por ajax";
    
    // echo '<pre>';
    //     print_r ($_POST);
    // echo '</pre>';
    