<?php
require ("../../../../Model/session/session_administrador3.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <div class="form_info text">
                <label data-section="usuario" data-value="mail">Mail:</label>
                <input type="email" name="mail" required>
            </div>
            <div class="form_info text">
                <label data-section="usuario" data-value="contraseña">Contraseña:</label>
                <input type="password" name="contra" required>
            </div>
            <div class="form_info text">
                <label data-section="usuario" data-value="estado">Estado:</label>
                <select name="estado">
                    <option value="Activo" data-section="usuario" data-value="activo">Activo</option>
                    <option value="Inactivo" data-section="usuario" data-value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="usuario" data-value="rol">Rol:</label>
                <select name="rol">
                    <option value="Administrador" data-section="usuario" data-value="admin">Administrador</option>
                    <option value="AlmacenInterno" data-section="usuario" data-value="interno">Almacen Interno</option>
                    <option value="AlmacenExterno" data-section="usuario" data-value="externo">Almacen Externo</option>
                    <option value="ChoferCamion" data-section="usuario" data-value="choferCamion">Chofer de Camion</option>
                    <option value="ChoferCamioneta" data-section="usuario" data-value="choferCamioneta">Chofer de Camioneta</option>
                </select>
            </div>   
            <input type="submit" value="Agregar" class="btn" data-section="boton" data-value="agregar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="usuario_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>