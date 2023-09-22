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
            $sentencia = "SELECT CIC FROM camionero WHERE CIC NOT IN (SELECT CIC FROM conduce)";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info">
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
            $sentencia = "SELECT MatriculaV FROM vehiculo WHERE MatriculaV NOT IN (SELECT MatriculaC FROM camioneta)";
            $filas = $conexion->query($sentencia);
            ?>
                <div class="form_info">
                    <label>Matricula:</label>
                    <select name="matriculaV" required>
                        <?php
                        foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                            echo '<option value="' . $fila['MatriculaV'] . '">' . $fila['MatriculaV'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            <input type="submit" value="Agregar" class="btn">
        <a href="conduce_index.php" class="btn">Ver Camioneros Asignados</a>
        </form>
    </div>
    <div class="btn_volver">
        <a href="camionero_index.php" class="btn">Volver</a>
    </div>
</body>

</html>