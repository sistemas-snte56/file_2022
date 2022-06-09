<?php 
    session_start();

    if(isset($_SESSION['usuario'])){

    
    include "header.php"; 
?>

    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-2">
            <h4 class="display-6 fw-bold">Gestor de archivos</h4>
        </div>


        <div class="row p-3 mb-4 ">
            <div class="col-sm-4">
                <!-- Button  -->
                <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarCategoria">
                    <span class="fas fa-plus-circle"></span> Agregar archivos
                </span>
            </div>
        </div>

    </div>




    <!-- Container -->
    <div class="container">
        <row class="justify-content-center">
            <div class="col-auto mb-12">
                <div id="tablaGestorArchivos"></div>
            </div>
        </row>
    </div>



    <!-- Modal para Agregar archivos -->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" aria-labelledby="modalAgregarArchivoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarArchivoLabel">Agregar Archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="frmAgregarArchivos" enctype="multipart/form-data" method="post" >
                        <div class="mb-3">
                            <div id="cargarCategoria"></div>
                        </div>

                        <div class="mb-3">
                            <label for="nombreArchivo" class="col-form-label">Nombre de Archivo</label>
                            <input type="file" class="form-control" id="nombreArchivo" name="nombreArchivo">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnGuardarArchivo">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>








<?php include "footer.php" ?>



<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
        $('#cargarCategoria').load("categorias/selectCategoria.php");
        $('#btnGuardarArchivo').click(function(){
            var formData = new FormData(document.getElementById('frmArchivos'));
            $.ajax({

            });
        });
    });

</script>

<?php
    } else {
        header('location:../index.php');
    }
     
?>