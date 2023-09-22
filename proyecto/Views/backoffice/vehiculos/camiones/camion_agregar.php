<?php
require ("../../../../Model/session/session_administrador2.php");
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
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
        <?php
            $conexion = new mysqli("localhost", "root", "", "proyecto");
            $sentencia = "SELECT * FROM vehiculo WHERE MatriculaV NOT IN (SELECT MatriculaC FROM camioneta) AND MatriculaV NOT IN (SELECT Matricula FROM camion)";
            $filas = $conexion->query($sentencia);
            ?>
                <div class="form_info">
                    <label>ID:</label>
                    <select name="Matricula" required>
                        <?php
                        foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                            echo '<option value="' . $fila['MatriculaV'] . '">' . $fila['MatriculaV'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            <div class="form_info">
                <label>Peso:</label>
                <input type="text" name="Peso">
            </div>
            <div class="form_info">
                <label>Alto:</label>
                <input type="text" name="Alto">
            </div>
            <div class="form_info">
                <label>Ancho</label>
                <input type="text" name="Ancho">
            </div>
            <div class="form_info">
                <label>Largo:</label>
                <input type="text" name="Largo">
            </div>
            <div class="form_info">
                <label>Tipo</label>
                <input type="text" name="Tipo">
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="camion_index.php" class="btn">Volver</a>
    </div>
</body>
</html>