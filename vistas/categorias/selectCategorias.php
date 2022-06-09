<?php
    session_start();

    require_once "../../clases/Conexion.php";
    
    // $conexion = new Conectar();
    // $conexion = $conexion -> conexion();
    
    $id_usuario = $_SESSION['id_usuario'];

    $tabla = "tbl_categorias";
    $stmt = Conectar::conexion()->prepare("SELECT * FROM $tabla WHERE id_usuario = '$id_usuario' ");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
?>

<select class="form-select" name="categoriasArchivos" id="categoriasArchivos">    
    <?php while($row = $stmt->fetch()) { $id_categoria = $row['id_categoria']; ?>
        <option value="<?php echo $id_categoria ?>"><?php echo $row["nombre"] ?></option>
    <?php } ?>
</select>
