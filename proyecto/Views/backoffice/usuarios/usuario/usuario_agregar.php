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
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../insertar.php" method="post">
            <div class="form_info">
                <label>Mail:</label>
                <input type="email" name="mail" required>
            </div>
            <div class="form_info">
                <label>Contraseña:</label>
                <input type="password" name="contra" required>
            </div>
            <div class="form_info">
                <label>Estado:</label>
                <select name="estado">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form_info">
                <label>Rol:</label>
                <select name="rol">
                    <option value="Administrador">Administrador</option>
                    <option value="AlmacenInterno">Almacen Interno</option>
                    <option value="AlmacenExterno">Almacen Externo</option>
                    <option value="ChoferCamion">Chofer de Camion</option>
                    <option value="ChoferCamioneta">Chofer de Camioneta</option>
                </select>
            </div>          
            <input type="submit" value="Agregar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="usuario_index.php" class="btn">Volver</a>
    </div>
</body>
</html>