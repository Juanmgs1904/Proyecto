<?php
require ("../../../../Model/session/session_administrador3.php");
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
                    <select name="MatriculaC" required>
                        <?php
                        foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                            echo '<option value="' . $fila['MatriculaV'] . '">' . $fila['MatriculaV'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="camioneta_index.php" class="btn">Volver</a>
    </div>
</body>
</html>