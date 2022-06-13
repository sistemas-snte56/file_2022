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

        public function obtenerRutaArchivo($id_archivo) {
            
            $tabla = "tbl_archivos";
            // $resultado = [];
            $resultado = array();
            
            $stmt = Conectar::conexion()->prepare("SELECT * FROM tbl_archivos WHERE id_archivo = '$id_archivo'");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            while ( $row = $stmt->fetch() ) {
                $resultado['nombre'] = $row['nombre'];
                $resultado['tipo'] = $row['tipo'];
            }

            return self::tipoArchivo($resultado['nombre'], $resultado['tipo']);



            /*
                //var_dump($resultado);

                // $tabla = "tbl_archivos";

                // $stmt = Conectar::conexion()->prepare("SELECT nombre FROM $tabla WHERE id_archivo = :id_archivo" );
                // $stmt->bindParam(":id_archivo", $id_archivo, PDO::PARAM_INT);
                // $stmt->execute();

                // //$resultado = $stmt->fetchAll();

                // $resultado = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
                // var_dump($resultado);


                // return $resultado['tipo'];
            */



        }

        public function tipoArchivo($nombre, $extension) {
            $id_usuario = $_SESSION['id_usuario'];
            $ruta = "../archivos/" . $id_usuario . "/" . $nombre ;
            
            switch ($extension) {
                case 'png': 
                    return '<img src="'.$ruta.'" width="50%" >';
                    break; 
                case 'jpg': 
                    #code 
                    break; 
                case 'jpeg': 
                    #code 
                    break; 
                case 'pdf': 
                    //return '<embebed src="'.$ruta.' #toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px"';
                    return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
                    break; 
                case 'mov': 
                    #code 
                    break; 
                case 'mp3': 
                    #code 
                    break; 
                case 'mp4': 
                    #code 
                    break; 
                case 'zip': 
                    #code 
                    break; 
                case 'rar': 
                    #code 
                    break; 
                default:
                    # code...
                    break;
            }
        }
    }


?>