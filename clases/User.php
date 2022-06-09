<?php
    
    require_once "Connection.php";
        
    class User extends Connect {
        
        public function usuarioLogin($usuario, $password){

            $connection = Connect::connection();

            $username = stripcslashes($usuario);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($connection, $username);  
            $password = mysqli_real_escape_string($connection, $password);  
        
            $sql = "select * from tbl_usuarios where usuario = '$username' and password = '$password'";  
            $result = mysqli_query($connection, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);


            if ($count == 1)
            {
                $_SESSION['usuario'] = $username;                
            }
            else
            {
                $fmsg = "Invalid Login Credentials.";            
            }
            if (isset($_SESSION['usuario']))
            {
                $username = $_SESSION['usuario'];
                //header("Location: ../../vistas/inicio.php");
                return print(1);
            }
            else
            {
                return print(2);
            }        
            
        }
    
    }


?>