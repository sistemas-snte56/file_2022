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
                <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarArchivos">
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


    <!-- Modal para agregar archivos -->

    <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="modalAgregarArchivosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarArchivosLabel">Archivos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmArchivos" enctype="multipart/form-data" action="#" method="post">
                    <label for="">Categorías</label>
                    <div id="categoriasLoad"></div>
                    <label for="">Selecciona archivos</label>
                    <input type="file" name="archivos[]" id="archivos" class="form-control" multiple="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
            </div>
            </div>
        </div>
    </div>




<?php include "footer.php" ?>


<script src="../js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
        $('#categoriasLoad').load("categorias/selectCategorias.php");
        $('#btnGuardarArchivos').click(function(){
            agregarArchivosGestor();
        });
    });

</script>

<?php
    } else {
        header('location:../index.php');
    }
     
?>