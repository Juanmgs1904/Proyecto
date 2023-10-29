<?php
require ("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Persona</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <?php
    $ci = $_GET['ci'];
    $nombre = $_GET['nombre'];
    $telefono = $_GET['telefono'];
    $direccion = $_GET['direccion'];
    ?>
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info text">
                <label>CI:</label> 
                <input type="text" name="ci" value="<?=$ci?>" readonly>
            </div>
            <div class="form_info text">
                <label data-section="persona" data-value="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?=$nombre?>" required>
            </div>
            <div class="form_info text">
                <label data-section="persona" data-value="telefono">Teléfono</label>
                <input type="text" name="tel" value="<?=$telefono?>" required> 
            </div>
            <div class="form_info text">
                <label data-section="persona" data-value="direccion">Dirección:</label>
                <input type="text" name="dir" value="<?=$direccion?>">
            </div>
            <input type="submit" value="Modificar" class="btn" class="btn" data-section="boton" data-value="modificar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="personas_index.php" class="btn" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>