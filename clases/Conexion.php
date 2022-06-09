<?php

    // class Conectar{
    //     public function conexion() {	
    //         $hostname="localhost";
    //         $username="root";
    //         $password="";
    //         $dbname="gestor";
            
    //         $conexion = mysqli_connect($hostname,$username, $password, $dbname); 

    //         return $conexion;
    //     }

    //}

    class Conectar{
    
        static public function conexion(){
    
            #PDO("nombre del servidor; nombre de la base de datos", "usuario", "contraseña")
    
            $link = new PDO("mysql:host=localhost;dbname=gestor", 
                            "root", 
                            "");
    
            $link->exec("set names utf8");
    
            return $link;
    
        }
    
    }
    