<?php

require ("../../../../Model/session/session_administrador3.php");
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
        <h1>Ingresar Datos</h1>
        <form class="form" action="almacen_insertar.php" method="post">
            <div class="form_info">
                <label>Ubicacion:</label>
                <input type="text" name="ubicacion" required>
            </div>
            <div class="form_info">
                <label>Ruta:</label>
                <input type="number" name="ruta" required>
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="almacen_index.php" class="btn">Volver</a>
    </div>
</body>
</html>