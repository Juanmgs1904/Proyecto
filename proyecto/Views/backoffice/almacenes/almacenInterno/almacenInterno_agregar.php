<?php
require("../../../../Model/session/session_administrador3.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Almacen de QuickCarry</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body class="fondo">
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <?php
            $conexion = new mysqli("localhost", "root", "", "proyecto");
            $sentencia = "SELECT * FROM almacen WHERE id NOT IN (SELECT idE FROM AlmacenExterno) AND id NOT IN (SELECT idI FROM AlmacenInterno)";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info">
                <label>ID:</label>
                <select name="idI" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['id'] . '">' . $fila['id'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            
            <div class="form_info">
                <label>Ruta:</label>
                <input type="number" name="ruta" required>
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="almacenInterno_index.php" class="btn">Volver</a>
    </div>
</body>

</html>