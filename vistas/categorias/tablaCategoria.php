<?php
    session_start();

    require_once "../../clases/Conexion.php";
    $id_usuario = $_SESSION['id_usuario'];
    $conexion = new Conectar();
    $conexion = $conexion -> conexion();
?>

        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover" id="tablaCategoriaDataTable">
                    <thead>

                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            // FETCH_ASSOC
                            $stmt = Conectar::conexion()->prepare("SELECT * FROM tbl_categorias WHERE id_usuario = '$id_usuario'");
                            // Especificamos el fetch mode antes de llamar a fetch()
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            // Ejecutamos
                            $stmt->execute();
                            // Mostramos los resultados
                            /*while ($row = $stmt->fetch()){
                                echo "Nombre: {$row["nombre"]} <br>";
                                echo "Categoria: {$row["fechaInsert"]} <br><br>";
                            }*/                     
                            while($row = $stmt->fetch()  ) {
                                $id_categoria = $row['id_categoria'];


                        ?>
                            <tr>
                                <td><?php echo $row["nombre"] ?></td>
                                <td><?php echo $row["fechaInsert"] ?></td>
                                <td>
                                    <!-- Button trigger modal actualizar categoría-->
                                    <span   class="btn btn-warning- btn-sm" 
                                            onclick="datosCategoria(<?php echo $id_categoria ?>)"  
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalActualizarCategoria" > <span class="fas fa-edit"></span> </span>
                                </td>
                                <td>
                                    <span class="btn btn-danger- btn-sm"  onclick="eliminarCategoria(<?php echo $id_categoria ?>)"> <span class="fas fa-trash-alt"></span> </span>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>







<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategoriaDataTable').DataTable();
    });


</script>