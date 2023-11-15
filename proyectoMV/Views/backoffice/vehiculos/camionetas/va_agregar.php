<?php
require("../../../../Model/session/session_administrador3.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Camioneta</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body class="fondo">
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <?php
            $conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
            $sentencia = "SELECT MatriculaC FROM camioneta where MatriculaC not in (Select MatriculaC from va)";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label data-section="camioneta" data-value="matricula">Matricula:</label>
                <select name="MatriculaVa" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['MatriculaC'] . '">' . $fila['MatriculaC'] . '</option>';
                    }
                    ?>
                </select>
            </div> 

            <?php
            $sentencia = "SELECT idI FROM almaceninterno";
            $filas = $conexion->query($sentencia);
            ?>
                <div class="form_info text">
                    <label data-section="personal" data-value="id">ID del almacén:</label>
                    <select name="idI" required>
                        <?php
                        foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                            echo '<option value="' . $fila['idI'] . '">' . $fila['idI'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        <a href="va_index.php" class="btn" data-section="camioneta" data-value="op">Ver Camionetas Asignadas</a>
        </form>
    </div>
    <div class="btn_volver">
        <a href="camioneta_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>