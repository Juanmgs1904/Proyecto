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
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <div class="form_info text">
                <label>CI:</label>
                <input type="number" name="ci" required>  
            </div>
            <div class="form_info text">
                <label data-section="persona" data-value="nombre">Nombre:</label> 
                <input type="text" name="nombre" required>  
            </div>
            <div class="form_info text">
                <label>Mail:</label> 
                <input type="email" name="Mail" required>  
            </div>
            <div class="form_info text">
                <label data-section="persona" data-value="telefono">Teléfono:</label> 
                <input type="text" name="tel" required>
            </div>
            <div class="form_info text">
                <label data-section="persona" data-value="direccion">Dirección:</label>
                <input type="text" name="dir">
            </div>    
            <input type="submit" value="Agregar" class="btn" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="personas_index.php" class="btn" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>