<?php

    session_start();

    $host = "localhost";  
    $user = "root";  
    $pwd = '';  
    $db_name = "gestor";  

    $connection = mysqli_connect($host, $user, $pwd, $db_name);  
    if(mysqli_connect_error()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }     


    if (isset($_POST['txtUserIngresar']) and isset(($_POST['txtPasswordIngresar']))){
        
        $username = $_POST['txtUserIngresar'];
        $password = sha1($_POST['txtPasswordIngresar']);

        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($connection, $username);  
        $password = mysqli_real_escape_string($connection, $password);  
        
        $sql = "select * from tbl_usuarios where usuario = '$username' and password = '$password'";  
        $result = mysqli_query($connection, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
        
        if ($count == 1){
            $_SESSION['usuario'] = $username;

            // $sql = "select id_usuario from tbl_usuarios where usuario = '$username' and password = '$password'";  
            // $result = mysqli_query($connection, $sql);  
            // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            // $id_usuario = mysqli_num_rows($result);       

            $sql_idUsuario = "select id_usuario from tbl_usuarios where usuario = '$username' and password = '$password'";
            $result1 = mysqli_query($connection, $sql_idUsuario);
            $id_usuario = mysqli_fetch_row($result1)[0];

            $sql_Nombre = "select nombre from tbl_usuarios where usuario = '$username' and password = '$password'";
            $result2 = mysqli_query($connection, $sql_Nombre);
            $nombre = mysqli_fetch_row($result2)[0];

            $sql_Apaterno = "select apaterno from tbl_usuarios where usuario = '$username' and password = '$password'";
            $result3 = mysqli_query($connection, $sql_Apaterno);
            $apaterno = mysqli_fetch_row($result3)[0];

            $sql_Amaterno = "select materno from tbl_usuarios where usuario = '$username' and password = '$password'";
            $result4 = mysqli_query($connection, $sql_Amaterno);
            $materno = mysqli_fetch_row($result4)[0];

            // echo print_r($id_usuario);
            $_SESSION['id_usuario'] = $id_usuario;
            $_SESSION['nombre'] = $nombre; 
            $_SESSION['apaterno'] = $apaterno; 
            $_SESSION['materno'] = $materno; 
            //echo ($id_usuario);
        }
        else{
            $fmsg = "Invalid Login Credentials.";           
        }
    }

    if (isset($_SESSION['usuario'])){
        $username = $_SESSION['usuario'];
            //header("Location: ../../vistas/inicio.php");
            return print(1);
    } else {
        return print(0);
    }

?>

