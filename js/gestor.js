function agregarArchivosGestor(){
    var formData = new FormData(document.getElementById('frmArchivos'));
    $.ajax({
        url: "../procesos/gestor/guardarArchivos.php",
        type: "POST",
        datatype: "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false,
        success:function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                swal(":D","Archivo agregado satisfactoriamente","success");
                $('#modalAgregarArchivos').modal('hide');
            } else {
                swal(":/","Error al cargar el archivo","error");
                
            }
        }
    });
}

function elimiarArchivo(idArchivo) {

    idArchivo = parseInt(idArchivo);

    if (idArchivo < 1) {
        swal(":/","No hay archivo que eliminar...!!!","danger");
    } else {
        swal({
            title:"¿Deseas eliminar el archivo?",
            text:"Una vez eliminado, ¡no se podrá recuperar!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    data: "idArchivo=" + idArchivo,
                    url : "../procesos/gestor/eliminarArchivo.php",
                    success : function (respuesta) {
                        respuesta = respuesta.trim();
                        if (respuesta == 1) {
                            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                            swal("Bien...!","¡El archivo ha sido eliminado!",{icon: "success"});
                        } else {
                            swal("Este archivo no pudo ser eliminado.");
                        }
                    }
                });
            } else {
                swal("El archivo no fue eliminado.");
            }
        });
    }

}

function obtenerArchivoPorId(idArchivo) {
    $.ajax({
        type : "POST",
        data : "idArchivo=" + idArchivo,
        url : "../procesos/gestor/obtenerArchivo.php",
        success : function (respuesta) {
            $('#archivoObtenido').html(respuesta);
        }
    });
}