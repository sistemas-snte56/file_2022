<?php

    session_start();
    require_once "../../clases/Categoria.php";

    $datos = array (
        "id_categoria" => $_POST['txtIdCategoria'],
        "nombre" => $_POST['txtCategoriaNombreUpdate']
    );


    $categoria = new Categoria();
    echo $categoria -> actualizarCategoria($datos);

?>