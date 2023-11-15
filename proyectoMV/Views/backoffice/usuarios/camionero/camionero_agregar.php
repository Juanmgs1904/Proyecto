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
            $conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
            $sentencia = "SELECT * FROM vwpersonas";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label>CI:</label>
                <select name="ciC" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['CI'] . '">' . $fila['CI'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form_info text">
                <label class="fechaV" data-section="camionero" data-value="fecha">Fecha Vencimiento Licencia</label>
                <input type="date" name="fechaVL" required>
            </div>

            <div class="form_info text">
                <label data-section="camionero" data-value="turno">Turno</label>
                <select name="turno">
                    <option value="mañana" data-section="camionero" data-value="mañana">Mañana</option>
                    <option value="tarde" data-section="camionero" data-value="tarde">Tarde</option>
                    <option value="noche" data-section="camionero" data-value="noche">Noche</option>
                </select>
            </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="camionero_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>