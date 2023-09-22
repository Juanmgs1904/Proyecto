<?php
require ("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <div class="form_info">
                <label>CI:</label>
                <input type="number" name="ci" required>  
            </div>
            <div class="form_info">
                <label>Nombre:</label> 
                <input type="text" name="nombre" required>  
            </div>
            <div class="form_info">
                <label>Teléfono:</label> 
                <input type="text" name="tel" required>
            </div>
            <div class="form_info">
                <label>Dirección:</label>
                <input type="text" name="dir">
            </div>    
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="personas_index.php" class="btn">Volver</a>
    </div>
</body>
</html>