<?php
require ("../../../Model/session/session_administrador2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar paquete</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="fondo">
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="paquete_insertar.php" method="post">
            <div class="form_info">
                <label>Peso:</label>
                <input type="text" name="Peso" required>
            </div>
            <div class="form_info">
            <label>Estado:</label>
                <select name="Estado">
                    <option value="No Asignado">No Asignado</option>
                    <option value="LoteAsignado">Lote Asignado</option>
                    <option value="CamionetaAsignada">Camioneta Asignada</option>
                    <option value="Entregado">Entregado</option>
                </select>
            </div>
            <div class="form_info">
                <label class="fechaV">Fecha de recibo:</label>
                <input type="date" name="fRecibo" required>
            </div>
            <div class="form_info">
                <label class="fechaV">Fecha de entrega:</label>
                <input type="date" name="fEntrega" required>
            </div>
            <div class="form_info">
                <label>Destiantario:</label>
                <input type="text" name="Destinatario" required>
            </div>
            <div class="form_info">
                <label>Destino:</label>
                <input type="text" name="Destino" required>
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="paquete_index.php" class="btn">Volver</a>
    </div>
</body>
</html>