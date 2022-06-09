<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="library/jquery-ui/jquery-ui.css"  rel="stylesheet" >
    <link href="library/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="library/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="library/jquery/3.2.1/jquery.min.js"></script>   
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center"><center> Registro de usuario</center></h2>
        <div class="row">
            <div class="col-md-12">
            
                <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="txtNombre" placeholder="Nombre" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apaterno">Apellido Parterno</label>
                            <input type="text" class="form-control" id="apaterno" name="txtApaterno" placeholder="Apellido paterno" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="materno">Apellido Materno</label>
                            <input type="text" class="form-control" id="materno" name="txtMaterno" placeholder="Apellido materno" required="">
                        </div>
                    </div>  
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="fecha">Fecha de nacimiento</label>
                            <input type="text" class="form-control" id="FechaDeNacimiento" name="txtFecha" placeholder="Fecha" required="" readonly="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email">Correo eletrónico</label>
                            <input type="email" class="form-control" id="email" name="txtEmail" placeholder="Email" required="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="txtUsuario" placeholder="Usuario" required="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="txtPassword" placeholder="Password" required="">
                        </div>

                    </div>
                    <p class="text-right">
                        <button type="submit" class="btn btn-primary text-right">Registrarse</button>
                        
                        <a href="index.php" class="btn btn-success">Login</a>

                    </p>
                </form> 

            </div>

        </div>
    </div>
    <script src="library/datatable/jquery-3.5.1.js"></script>
    <script src="library/jquery-ui/jquery-ui.js"></script>
    <script src="library/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var fechaA = new Date();
            var yyyy = fechaA.getFullYear();
            $("#FechaDeNacimiento").datepicker({
                changeMonth : true,
                changeYear : '1900:' + yyyy,
                dateFormat : "dd-mm-yy"
            });
        });


        function agregarUsuarioNuevo(){
            $.ajax({
                method : "POST",
                data : $('#frmRegistro').serialize(),
                url : "procesos/usuario/registro/agregarUsuario.php",
                
                success:function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1){
                        $('#frmRegistro')[0].reset();
                        swal(":D", "Agregado con exito.", "success");
                        
                    } else if (respuesta == 2) {
                        swal("Este usuario ya se encuentra registrado");

                    } else {
                        swal(":(", "Fallo al agregar", "Error");
                    }
                    console.log(respuesta);
                }
            });
            
            return false;
        };
    </script>
</body>
</html>