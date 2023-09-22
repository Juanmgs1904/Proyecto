<?php
require ("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Almacen</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <?php
    $id = $_GET['id'];
    $ubicacion = $_GET['ubicacion'];
    ?>
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info">
                <label>ID:</label>
                <input type="text" name="id" value="<?=$id?>" readonly>
            </div>
            <div class="form_info">
                <label>Ubicacion:</label>
                <input type="text" name="ubicacion" value="<?=$ubicacion?>" required>
            </div>
            <input type="submit" value="Modificar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="almacen_index.php" class="btn">Volver</a>
    </div>
</body>
</html>