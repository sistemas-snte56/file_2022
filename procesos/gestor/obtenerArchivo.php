<?php

    session_start();
    require_once "../../clases/Gestor.php";

    $gestor = new Gestor();
    // echo json_encode($gestor->obtenerRutaArchivo($_POST['idArchivo']));
    echo $gestor->obtenerRutaArchivo($_POST['idArchivo']);

?>  