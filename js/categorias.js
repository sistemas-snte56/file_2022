function agregarCategoria(){
    var categoria = $('#nombreCategoria').val();
    if (categoria == "") {
        swal("Debes agregar una categoria");
        return false;
    } else {
        $.ajax({
            type: "POST",                    
            data: "categoria="+categoria,
            url: "../procesos/categorias/agregarCategoria.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablaCategoria').load("categorias/tablaCategoria.php");
                    $('#nombreCategoria').val("");
                    swal(":D", "Agregada con exito!", "success");
                    $('#modalAgregarCategoria').modal('hide');
                } else {
                    swal(":(", "Fallo al ingresar", "error");
                }
            }
        });
    }
}

function datosCategoria(idCategoria){
    $.ajax({
        type:"POST",
        data:"idCategoria="+idCategoria,
        url:"../procesos/categorias/obtenerCategoria.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#txtIdCategoria').val(respuesta['id_categoria']);
            $('#txtCategoriaNombreUpdate').val(respuesta['nombre']);
        }
    });
}

function actualizarCategoria(){
    if($('#txtCategoriaNombreUpdate').val() == '') {
        swal(":/","El campo nombre esta vacío", "danger");
    } else {
        $.ajax({
            type:"POST",
            data: $('#frmActualizarCategorias').serialize(),
            url:"../procesos/categorias/actualizarCategoria.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                if (respuesta == 1 ) {
                    $('#tablaCategoria').load("categorias/tablaCategoria.php");
                    swal("Bien...! ¡La categoría ha sido actualizada!", {
                        icon: "success",
                    });      
                    $('#modalActualizarCategoria').modal('hide');                          
                } else {
                    swal("La categoría no ha sido actualizada.");
                }
            }
        });       
    }
}

function eliminarCategoria(idCategoria){
    idCategoria = parseInt(idCategoria);

    if (idCategoria < 1) {
        swal(":/","No tienes id de categoría...!", "danger");
    } else {
        swal({
            title: "¿Deseas eliminar la categoría?",
            text: "Una vez eliminado, ¡no podrá recuperarla!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:"POST",
                    data:"idCategoria="+idCategoria,
                    url:"../procesos/categorias/eliminarCategoria.php",
                    success:function(respuesta){
                        respuesta = respuesta.trim();
                        if (respuesta == 1 ) {
                            $('#tablaCategoria').load("categorias/tablaCategoria.php");
                            swal("Bien...! ¡La categoría ha sido eliminada!", {
                                icon: "success",
                            });                                
                        } else {
                            swal("La categoría no se eliminó por que tiene contenido.");
                        }
                    }
                });
            } else {
                swal("La categoría no se eliminó.");
            }
        });
    }
}