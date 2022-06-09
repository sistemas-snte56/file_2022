<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../library\bootstrap-5.0.2-dist\css\bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../library\fontawesome\css\all.css" rel="stylesheet" id="bootstrap-css">
    <link href="../library/datatable/dataTables.bootstrap5.min.css" rel="stylesheet" >
    <link href="../library\datatable\bootstrap.min.css" rel="stylesheet" >



    <title>Gestor de Archivos</title>
</head>
<body style="background-color: #f8f9fa">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../img/logo_menu.png" alt="..." >
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="inicio.php"><span class="fa-solid fa-house-chimney"></span>&nbsp Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php"><span class="fa-regular fa-address-book"></span>&nbsp Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestor.php"><span class="fa-regular fa-address-book"></span>&nbsp Archivos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fa-regular fa-user"></span>&nbsp <?php echo ($_SESSION['nombre']) ?> <?php echo ($_SESSION['apaterno']) ?> <?php echo ($_SESSION['materno']) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><span class="fa-regular fa-id-badge"></span>&nbsp Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../procesos/usuario/salir.php"><span class="fa-solid fa-arrow-right-from-bracket"></span>&nbsp Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
