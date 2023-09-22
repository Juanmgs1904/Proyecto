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
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info">
                <label>CI:</label> 
                <input type="text" name="ci" value="<?=$ci?>" readonly>
            </div>
            <div class="form_info">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?=$nombre?>" required>
            </div>
            <div class="form_info">
                <label>Teléfono</label>
                <input type="text" name="tel" value="<?=$telefono?>" required> 
            </div>
            <div class="form_info">
                <label>Dirección:</label>
                <input type="text" name="dir" value="<?=$direccion?>">
            </div>
            <input type="submit" value="Modificar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="personas_index.php" class="btn">Volver</a>
    </div>
</body>
</html>