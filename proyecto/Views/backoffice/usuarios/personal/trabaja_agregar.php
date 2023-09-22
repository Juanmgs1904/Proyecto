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
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <?php
            $conexion = new mysqli("localhost", "root", "", "proyecto");
            $sentencia = "SELECT CIP FROM personal WHERE CIP NOT IN (SELECT CIP FROM trabaja)";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info">
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
            $sentencia = "SELECT id FROM almacen";
            $filas = $conexion->query($sentencia);
            ?>
                <div class="form_info">
                    <label class="fechaN">ID del Almacén:</label>
                    <select name="IDA" required>
                        <?php
                        foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                            echo '<option value="' . $fila['id'] . '">' . $fila['id'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            <input type="submit" value="Agregar" class="btn">
        <a href="trabaja_index.php" class="btn">Ver Personal Asignados</a>
        </form>
    </div>
    <div class="btn_volver">
        <a href="personal_index.php" class="btn">Volver</a>
    </div>
</body>

</html>