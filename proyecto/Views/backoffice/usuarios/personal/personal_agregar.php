<?php
require ("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Personal</title>
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
                <select name="ciP" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['CI'] . '">' . $fila['CI'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form_info">
                <label>Cargo:</label>
                <input type="text" name="cargo" required>
            </div>
            <div class="form_info">
                <label class="fechaN">Fecha de Nacimiento:</label>
                <input type="date" name="fechaN" required>
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="personal_index.php" class="btn">Volver</a>
    </div>
</body>
</html>