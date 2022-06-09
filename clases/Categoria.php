<?php

    require_once "Conexion.php";

    class Categoria extends Conectar {
        
        public function agregarCategoria($datos){
            
            

            //$sql = "insert into tbl_categorias (id_usuario, nombre) values ()";  

            //return print_r($datos["categoria"]);


            $tabla = "tbl_categorias";
            $stmt = Conectar::conexion()->prepare("INSERT INTO $tabla(id_usuario,nombre ) VALUES (:id_usuario,:nombre)");

            #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

            $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["categoria"], PDO::PARAM_STR);


            if ($stmt->execute()){                                    
                return 1;
            } else {
                print_r(Conectar::conexion()->errorInfo());
                return 0;
            };
            $stmt = null;
            $stmt -> close();


        }

        public function  obtenerCategoria($id_categoria){
            $tabla = "tbl_categorias";
            // $resultado = [];
            $resultado = array();
            
            $stmt = Conectar::conexion()->prepare("SELECT * FROM tbl_categorias WHERE id_categoria = '$id_categoria'");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            while ( $row = $stmt->fetch() ) {
                $resultado['id_categoria'] = $row['id_categoria'];
                $resultado['nombre'] = $row['nombre'];
            }

            return $resultado;

        }

        public function actualizarCategoria($datos) {
            $tabla = "tbl_categorias";

            //UPDATE `tbl_categorias` SET `nombre` = 'YEAR 2022' WHERE `tbl_categorias`.`id_categoria` = 21;
            //

            $stmt = Conectar::conexion()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_categoria = :id_categoria"  );
            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);



            if ($stmt->execute()){                                    
                return 1;
            } else {
                print_r(Conectar::conexion()->errorInfo());
                return 0;
            };
            $stmt = null;
            $stmt -> close();
            
            
        }




        public function eliminarCategoria($id_categoria){
            $tabla = "tbl_categorias";
                       
            $stmt = Conectar::conexion()->prepare("DELETE FROM $tabla WHERE id_categoria=:id_categoria");
            $stmt->bindParam(":id_categoria",$id_categoria,PDO::PARAM_INT);
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