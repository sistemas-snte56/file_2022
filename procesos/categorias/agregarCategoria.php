<?php

    session_start();

    require_once "../../clases/Categoria.php";

    $datos = array (
        "id_usuario" => $_SESSION['id_usuario'],
        "categoria" => $_POST['categoria']
    );


    //print_r( $datos['id_usuario']);
    $categoria = new Categoria();
    echo $categoria -> agregarCategoria($datos);
    

?>