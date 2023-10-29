<?php
require("../../../../Model/session/session_administrador3.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Camionero</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body class="fondo">
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <?php
            $conexion = new mysqli("localhost", "root", "", "ocean");
            $sentencia = "SELECT CIP FROM vwpersonal";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label>CI:</label>
                <select name="CIP" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['CIP'] . '">' . $fila['CIP'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <?php
            $sentencia = "SELECT idI FROM almaceninterno";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label class="fechaN" data-section="personal" data-value="id">ID del Almacén:</label>
                <select name="IDA" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['idI'] . '">' . $fila['idI'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <input type="submit" value="Agregar" class="btn"  data-section="boton" data-value="agregar">
            <a href="trabaja_index.php" class="btn" data-section="personal" data-value="op2">Ver Personal Asignados</a>
        </form>
    </div>
    <div class="btn_volver">
        <a href="personal_index.php" class="btn"  data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>