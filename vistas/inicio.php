<?php

    session_start();
    if (isset($_SESSION['usuario'])) {
        include "header.php"; 
?>
        


<!-- Container -->
<div class="container">
    <row class="justify-content-center">
        <div class="col-auto mb-12">
            <h3>Hola</h3>    
            <p>Página de inicio de rama principal</p>
        </div>
    </row>
</div>


<?php 
        include "footer.php";
    }else {
        header('location:../index.php');
    }


?>