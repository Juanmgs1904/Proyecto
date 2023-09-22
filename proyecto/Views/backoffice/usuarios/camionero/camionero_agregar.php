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
            $sentencia = "SELECT * FROM personas WHERE CI NOT IN (SELECT CIC FROM camionero) AND CI NOT IN (SELECT CIP FROM personal)";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info">
                <label>CI:</label>
                <select name="ciC" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['CI'] . '">' . $fila['CI'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form_info">
                <label class="fechaV">Fecha Vencimiento Licencia</label>
                <input type="date" name="fechaVL" required>
            </div>
            <div class="form_info">
                <label>Turno</label>
                <select name="turno">
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noche">Noche</option>
                </select>
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="camionero_index.php" class="btn">Volver</a>
    </div>
</body>

</html>