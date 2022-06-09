<?php

    //session_start();

    require_once "../../clases/Categoria.php";

    // $datos = array (
    //     "id_usuario" => $_SESSION['id_usuario'],
    //     "categoria" => $_POST['categoria']
    // );

    
    $categoria = new Categoria();
    echo json_encode($categoria -> obtenerCategoria($_POST['idCategoria']));



?>