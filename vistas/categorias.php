<?php 
    session_start();

    if(isset($_SESSION['usuario'])){

    
    include "header.php"; 
?>

    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-2">
            <h4 class="display-6 fw-bold">Categorías de archivos</h4>           
        </div>
        <div class="row p-3 mb-4 ">
            <div class="col-sm-4">
                <!-- Button trigger modal -->
                <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarCategoria">
                    <span class="fas fa-plus-circle"></span> Agregar nueva categoría
                </span>
            </div>
        </div>
    </div>




    <!-- Container -->
    <div class="container">
        <row class="justify-content-center">
            <div class="col-auto mb-12">
                <div id="tablaCategoria"></div>
            </div>
        </row>
    </div>








    <!-- Modal Agregar Categoría -->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" aria-labelledby="modalAgregarCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarCategoriaLabel">Agregar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="frmAgregarCategorias">
                        <div class="mb-3">
                            <label for="nombreCategoria" class="col-form-label">Nombre de categoría</label>
                            <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal Actualizar Categoría -->
    <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="modalActualizarCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalActualizarCategoriaLabel">Actualizar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" method="post"  id="frmActualizarCategorias">
                        <div class="mb-3">
                            <input type="text" name="txtIdCategoria" id="txtIdCategoria" hidden="">
                            <label for="txtCategoriaNombreUpdate" class="col-form-label">Ingresa el nuevo nombre</label>
                            <input type="text" class="form-control" id="txtCategoriaNombreUpdate" name="txtCategoriaNombreUpdate"  required="">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizarCategoria">Actualzar cambios</button>
                </div>
            </div>
        </div>
    </div>











<?php include "footer.php" ?>


<script src="../js/categorias.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategoria').load("categorias/tablaCategoria.php");

        $('#btnGuardarCategoria').click(function(){
            agregarCategoria();
        });

        $('#btnActualizarCategoria').click(function(){
            actualizarCategoria();
        });


    });

</script>

<?php
    } else {
        header('location:../index.php');
    }
     
?>