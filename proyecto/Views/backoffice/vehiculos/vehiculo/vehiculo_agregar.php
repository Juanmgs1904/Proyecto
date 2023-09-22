<?php
require ("../../../../Model/session/session_administrador3.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vehículo</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
        <div class="form_info">
                <label>Matricula:</label> 
                <input type="text" name="MatriculaV" required>
            </div>
            <div class="form_info">
                <label>Estado:</label>
                <select name="Estado">
                    <option value="En buen estado">En buen estado</option>
                    <option value="En mal estado">En mal estado</option>
                </select>
            </div>
            <div class="form_info">
                <label>Disponibilidad:</label>
                <select name="Disponibilidad">
                    <option value="Disponible">Disponible</option>
                    <option value="En ruta">En ruta</option>
                </select>
            </div>        
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="vehiculo_index.php" class="btn">Volver</a>
    </div>
</body>
</html>