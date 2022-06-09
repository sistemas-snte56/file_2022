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
        }
    });
}