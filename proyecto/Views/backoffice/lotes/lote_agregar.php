<?php
require("../../../Model/session/session_administrador2.php");
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
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="lote_insertar.php" method="post">
            <div class="form_info text">
                <label data-section="lote" data-value="peso">Peso:</label>
                <input type="text" name="Peso" required>
            </div>
            <div class="form_info text">
                <label data-section="lote" data-value="estado">Estado:</label>
                <select name="Estado">
                    <option value="noAsignado">No Asignado</option>
                    <option value="asignado">Asignado</option>
                    <option value="entregado">Entregado</option>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="lote" data-value="destino">Destino:</label>
                <input type="text" name="Destino" required>
            </div>
            <div class="form_info text">
                <label class="fechaN" data-section="lote" data-value="tiempoEstimado">Tiempo Estimado:</label>
                <input type="datetime-local" name="tiempoEstimado" required>
            </div>
            
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="lote_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>