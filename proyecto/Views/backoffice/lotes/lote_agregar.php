<?php
require ("../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Lote</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="fondo">
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="lote_insertar.php" method="post">
            <div class="form_info">
                <label>Peso:</label>
                <input type="text" name="Peso" required>
            </div>
            <div class="form_info">
            <label>Estado:</label>
                <select name="Estado">
                    <option value="No Asignado">No Asignado</option>
                    <option value="Asignado">Asignado</option>
                    <option value="Entregado">Entregado</option>
                </select>
            </div>
            <div class="form_info">
                <label>Destino:</label>
                <input type="text" name="Destino" required>
            </div>
            <div class="form_info">
                <label>Ruta:</label>
                <input type="text" name="Ruta" required>
            </div>
            <div class="form_info">
                <label class="fechaN">Tiempo Estimado:</label>
                <input type="datetime-local" name="tiempoEstimado" required>
            </div>
            <div class="form_info">
                <label class="fechaN">ID Almacén:</label>
                <input type="text" name="idI" required>
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="lote_index.php" class="btn">Volver</a>
    </div>
</body>
</html>