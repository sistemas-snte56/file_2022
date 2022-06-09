<?php


    // session_start();

    // require_once "../../clases/User.php";

    // $txtUserIngresar = $_POST['txtUserIngresar'];
    // $txtPasswordIngresar = sha1($_POST['txtPasswordIngresar']);


    // $usuarioObj = new User();
    // echo $usuarioObj->usuarioLogin($txtUserIngresar, $txtPasswordIngresar);
    

    /**
     * =======================================================================================
     */


    
   

    session_start();

    $host = "localhost";  
    $user = "root";  
    $pwd = '';  
    $db_name = "gestor";  
    
    $connection = mysqli_connect($host, $user, $pwd, $db_name);  
    if(mysqli_connect_error()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }     


    //echo print_r($_POST);
    
    if (isset($_POST['txtUserIngresar']) and isset($_POST['txtPasswordIngresar']))
    {
        
        $username = $_POST['txtUserIngresar'];
        $password = sha1($_POST['txtPasswordIngresar']);
        
        // //$query = "SELECT * FROM tbl_usuarios WHERE usuario='$username' and password='$password'";
        // $query = "select * from tbl_usuarios where usuario = '$username' and password = '$password'";
        // $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        // $count = mysqli_num_rows($result);
        
        
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($connection, $username);  
        $password = mysqli_real_escape_string($connection, $password);  
        
        
        
        
        $sql = "select * from tbl_usuarios where usuario = '$username' and password = '$password'";  
        $result = mysqli_query($connection, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
        
        
        
        
        
        
        if ($count == 1)
        {
            //echo print_r("La variable $ count tiene un valor igual o mayor a 1 y entre al if");
            $_SESSION['usuario'] = $username;
            
            
        }
        else
        {
            //echo print_r("La variable $ count tiene un valor a 0 y entre al if else");
            $fmsg = "Invalid Login Credentials.";
           
        }
    }

    if (isset($_SESSION['usuario']))
    {
        $username = $_SESSION['usuario'];
            //header("Location: ../../vistas/inicio.php");
            return print(1);
        //echo print_r($username);
    }
    else
    {
        return print(0);
        //return print(2);
        //echo print("No hay nombre de usuario");
    }
    



?>

