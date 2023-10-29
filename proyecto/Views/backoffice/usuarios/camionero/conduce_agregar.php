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
            $conexion = new mysqli("localhost", "root", "", "ocean");
            $sentencia = "SELECT CIC FROM vwcamionero";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label>CI:</label>
                <select name="CIC" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['CIC'] . '">' . $fila['CIC'] . '</option>';
                    }
                    ?>
                </select>
            </div> 

            <?php
            $sentencia = "SELECT MatriculaV FROM vehiculo";
            $filas = $conexion->query($sentencia);
            ?>
                <div class="form_info text">
                    <label data-section="vehiculo" data-value="matricula">Matricula:</label>
                    <select name="matriculaV" required>
                        <?php
                        foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                            echo '<option value="' . $fila['MatriculaV'] . '">' . $fila['MatriculaV'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        <a href="conduce_index.php" class="btn" data-section="camionero" data-value="op">Ver Camioneros Asignados</a>
        </form>
    </div>
    <div class="btn_volver">
        <a href="camionero_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>