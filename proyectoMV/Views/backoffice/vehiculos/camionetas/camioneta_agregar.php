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
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
        <?php
            $conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
            $sentencia = "SELECT * FROM vwvehiculo";
            $filas = $conexion->query($sentencia);
            ?>
                <div class="form_info text">
                    <label data-section="camioneta" data-value="matricula">Matricula:</label>
                    <select name="MatriculaC" required>
                        <?php
                        foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                            echo '<option value="' . $fila['MatriculaV'] . '">' . $fila['MatriculaV'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="camioneta_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>