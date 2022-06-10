<?php

    session_start();
    require_once "../../clases/Gestor.php";

    $archivo = new Gestor();
    echo $archivo -> eliminarArchivo($_POST['idArchivo']);

?>  