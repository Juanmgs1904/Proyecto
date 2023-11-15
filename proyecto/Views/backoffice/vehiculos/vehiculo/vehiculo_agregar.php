<?php
require("../../../../Model/session/session_administrador3.php");
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
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <div class="form_info text">
                <label data-section="vehiculo" data-value="matricula">Matricula:</label>
                <input type="text" name="MatriculaV" required>
            </div>
            <div class="form_info text">
                <label data-section="vehiculo" data-value="estado">Estado:</label>
                <select name="Estado">
                    <option value="buenEstado" data-section="vehiculo" data-value="buen">En buen estado</option>
                    <option value="malEstado" data-section="vehiculo" data-value="mal">En mal estado</option>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="vehiculo" data-value="disponibilidad">Disponibilidad:</label>
                <select name="Disponibilidad">
                    <option value="disponible" data-section="vehiculo" data-value="disponible">Disponible</option>
                    <option value="enRuta" data-section="vehiculo" data-value="enRuta">En ruta</option>
                </select>
            </div>
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="vehiculo_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>