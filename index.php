<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="library/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet" >
    <script src="library/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="library/jquery/3.2.1/jquery.min.js"></script>   
    <title>Ingreso</title>
</head>
<body>
    
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            <img src="img/logo2.png" id="icon" alt="User Icon" />
            <h3><strong>SNTE | SECCIÓN 56</strong></h3>
            </div>

            <!-- Login Form -->
            <form method="post" id="frmLogin" onsubmit="return iniciarSesion()"  autocomplete="off">
                <input type="text" id="txtUserIngresar" class="fadeIn second" name="txtUserIngresar" placeholder="Usuario" required="">
                <input type="password" id="txtPasswordIngresar" class="fadeIn third" name="txtPasswordIngresar" placeholder="Contraseña"  required="">
                <input type="submit" class="fadeIn fourth" value="Ingresar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
            <a class="underlineHover" href="registro.php">Ir a la página de registro.</a>
            </div>

        </div>
    </div>
    <script src="library/datatable/jquery-3.5.1.js"></script>
    <script src="library/sweetalert.min.js"></script>    
    <script type="text/javascript">

        function iniciarSesion() {
            // alert ("Hola");
            // return false;

            $.ajax({
                type : "POST",
                data : $("#frmLogin").serialize(),
                url  : "procesos/login/login.php",
                success: function (respuesta){
                    respuesta = respuesta.trim();
                    
                    if(respuesta == 1){
                        //alert("respuesta = 1");
                        window.location = "vistas/inicio.php";
                        //location.href= "vistas/inicio.php";
                    } else {

                        //alert("respuesta = 0");
                        swal(":/", "fallo al entrar", "error");
                        $('#frmLogin')[0].reset();
                    }
                } 
            });
            return false;
        };

    </script>
</body>
</html>