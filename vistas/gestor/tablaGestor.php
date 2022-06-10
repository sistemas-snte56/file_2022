<?php
    session_start();

    require_once "../../clases/Conexion.php";
    $id_usuario = $_SESSION['id_usuario'];
    $conexion = new Conectar();
    $conexion = $conexion -> conexion();
    $tabla = "tbl_archivos";
?>



        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover" id="tablaGestorDataTable">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo de archivo</th>
                            <th scope="col">Descargar</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            //$stmt = Conectar::conexion()->prepare("SELECT * FROM $tabla WHERE id_usuario = '$id_usuario'");
                            //$stmt = Conectar::conexion()->prepare("SELECT * from tbl_archivos as archivos inner join tbl_usuarios as usuario on archivos.id_usuario = usuario.id_usuario inner join tbl_categorias as categorias on archivos.id_categoria = categorias.id_categoria and archivos.id_usuario = '$id_usuario';");
                            
                            
                            $stmt = Conectar::conexion()->prepare(" SELECT
                                                                        archivos.id_archivo,
                                                                        usuario.nombre,
                                                                        usuario.apaterno,
                                                                        usuario.materno,
                                                                        categorias.nombre,
                                                                        archivos.nombre,
                                                                        archivos.tipo,
                                                                        archivos.ruta,
                                                                        archivos.fecha
                                                                    FROM
                                                                        tbl_archivos AS archivos
                                                                    INNER JOIN tbl_usuarios AS usuario
                                                                    ON
                                                                        archivos.id_usuario = usuario.id_usuario
                                                                    INNER JOIN tbl_categorias AS categorias
                                                                    ON
                                                                        archivos.id_categoria = categorias.id_categoria AND archivos.id_usuario = '$id_usuario'"
                                                                );                            
                            
                            
                            
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            $stmt->execute();

                            while ($row = $stmt->fetch()) {
                                $id_archivo = $row['id_archivo'];
                                $rutaDescarga = "../archivos/".$id_usuario."/".$row['nombre'];
                                $rutaNombre = $row['nombre'];
                            


                        ?>
                        <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['tipo'] ?></td>
                            <td> <a href="<?php echo  $rutaDescarga ?>" download="<?php $rutaNombre ?>"> <span class="fas fa-download"></span></a> </td>
                            <td>#</td>
                            <td>
                                <span class="btn btn-danger- btn-sm"   onclick="elimiarArchivo(<?php echo $id_archivo ?>)" > <span class="fas fa-trash-alt"></span> </span>
                            </td>
                        </tr>

                        <?php } ?>




                    </tbody>
                </table>
            </div>
        </div>







<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorDataTable').DataTable();
    });

</script>