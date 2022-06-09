<?php

    require_once "Conexion.php";

    class Usuario extends Conectar {
        public function agregarUsuario($datos){
            
            
            if (self::buscarUsuarioRepetido($datos['usuario'])) {
                return 2;
            } else {
                $tabla = "tbl_usuarios";
                $stmt = Conectar::conexion()->prepare("INSERT INTO $tabla(nombre, apaterno, materno, fecha, email, usuario, password) VALUES (:nombre, :apaterno, :materno, :fecha, :email, :usuario, :password)");
    
                #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
    
                $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
                $stmt->bindParam(":apaterno", $datos["apaterno"], PDO::PARAM_STR);
                $stmt->bindParam(":materno", $datos["materno"], PDO::PARAM_STR);
                $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
                $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
                $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
                $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    
    
                if ($stmt->execute()){                                    
                    return 1;
                } else {
                    print_r(Conectar::conexion()->errorInfo());
                    return 0;
                };
                $stmt = null;
                $stmt -> close();
            }                
                            
        }
                
        public function buscarUsuarioRepetido($usuario){
            $tabla = "tbl_usuarios";
            $stmt = Conectar::conexion()->prepare("SELECT usuario FROM $tabla WHERE usuario = '$usuario'");

            $stmt->execute();

            return $stmt -> fetchAll();          
        }


        /**
         * Metodo para login 
         */

        /*public function ingresarUsuario($username, $userpassword){

            $host = "localhost";  
            $user = "root";  
            $password = '';  
            $db_name = "gestor";  
            
            $con = mysqli_connect($host, $user, $password, $db_name);  
            if(mysqli_connect_error()) {  
                die("Failed to connect with MySQL: ". mysqli_connect_error());  
            }
            

        
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $userpassword = stripcslashes($userpassword);  
            
            $username = mysqli_real_escape_string($con, $username);  
            $userpassword = mysqli_real_escape_string($con, $userpassword);  
            
          
            $sql = "SELECT * from tbl_usuarios where usuario = '$username' and password = '$userpassword'";  
            
            //print_r ($sql);
        
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  

            // return $count;
              
            if($count == 1){  
                return 1;  
                $_SESSION['usuario'] = $username;
            }  
            else{  
                return 0;
            }  
            
        }*/


        
        
    }
    
    

?>