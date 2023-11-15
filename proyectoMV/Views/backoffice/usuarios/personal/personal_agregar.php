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
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
        <?php
            $conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
            $sentencia = "SELECT * FROM vwpersonas";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label>CI:</label>
                <select name="ciP" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['CI'] . '">' . $fila['CI'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="personal" data-value="cargo">Cargo:</label>
                <input type="text" name="cargo" required>
            </div>
            <div class="form_info text">
                <label class="fechaN" data-section="personal" data-value="fecha">Fecha de Nacimiento:</label>
                <input type="date" name="fechaN" required>
            </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="personal_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>