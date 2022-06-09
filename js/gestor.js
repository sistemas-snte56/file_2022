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
            } else {
                swal(":/","Error al cargar el archivo","error");
                
            }
        }
    });
}