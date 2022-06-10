<?php

    require_once "Conexion.php";


    class Gestor extends Conectar {
        public function agregaRegistroArchivo($datos) {

            $tabla = "tbl_archivos";

            //id_usuario, id_categoria, nombre, tipo, ruta

            $stmt = Conectar::conexion()->prepare("INSERT INTO $tabla(id_usuario, id_categoria, nombre, tipo, ruta) VALUES (:id_usuario, :id_categoria, :nombre, :tipo, :ruta)");

            #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

            $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
            $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);

            if ($stmt->execute()){                                    
                $stmt = null;
                // $stmt -> close();
                return 1;
            } else {
                print_r(Conectar::conexion()->errorInfo());
                return 0;
            };

            
           // return $respuesta;

        }

        public function eliminarArchivo($id_archivo) {
           
            $tabla = "tbl_archivos";
            
            $stmt = Conectar::conexion()->prepare("DELETE FROM $tabla WHERE id_archivo = :id_archivo");
            $stmt->bindParam(":id_archivo", $id_archivo, PDO::PARAM_INT);
            $stmt->execute();
            
            if ($stmt->execute()){                                    
                return 1;
            } else {
                print_r(Conectar::conexion()->errorInfo());
                return 0;
            };             

        }
    }


?>