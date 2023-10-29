<?php
require("../../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Camión</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body class="fondo">
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <?php
            $conexion = new mysqli("localhost", "root", "", "ocean");
            $sentencia = "SELECT * FROM vwvehiculo";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label data-section="camion" data-value="matricula">Matricula:</label>
                <select name="Matricula" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['MatriculaV'] . '">' . $fila['MatriculaV'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="camion" data-value="peso">Peso:</label>
                <input type="text" name="Peso">
            </div>
            <div class="form_info text">
                <label data-section="camion" data-value="alto">Alto:</label>
                <input type="text" name="Alto">
            </div>
            <div class="form_info text">
                <label data-section="camion" data-value="ancho">Ancho</label>
                <input type="text" name="Ancho">
            </div>
            <div class="form_info text">
                <label data-section="camion" data-value="largo">Largo:</label>
                <input type="text" name="Largo">
            </div>
            <div class="form_info text">
                <label data-section="camion" data-value="tipo">Tipo</label>
                <input type="text" name="Tipo">
            </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="camion_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>