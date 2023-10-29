<?php
require("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Almacen</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body class="fondo">
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">

            <?php
            $conexion = new mysqli("localhost", "root", "", "ocean");
            $sentencia = "SELECT * FROM vwalmacen";
            $filas = $conexion->query($sentencia);
            ?>
            <div class="form_info text">
                <label>ID:</label>
                <select name="idE" required>
                    <?php
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        echo '<option value="' . $fila['id'] . '">' . $fila['id'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form_info text">
                <label data-section="almacenes" data-value="empresa">Empresa:</label>
                <input type="text" name="Empresa" required>
            </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>

    </div>
    <div class="btn_volver">
        <a href="almacenExterno_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>