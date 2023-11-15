<?php
require ("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Almacen</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <?php
    $id = $_GET['id'];
    $ubicacion = $_GET['ubicacion'];
    $Direccion = $_GET['Direccion'];
    ?>
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info text">
                <label>ID:</label>
                <input type="text" name="id" value="<?=$id?>" readonly>
            </div>
            <div class="form_info text">
                <label data-section="almacenes" data-value="ubicacion">Ubicacion:</label>
                <select name="ubicacion">
                    <?php
                    echo '<option value="' . $ubicacion . '">' . $ubicacion . '</option>';
                    ?>
                    <option value="Montevideo">Montevideo</option>
                    <option value="Canelones">Canelones</option>
                    <option value="Rivera">Rivera</option>
                    <option value="Tacuarembo">Tacuarembó</option>
                    <option value="Salto">Salto</option>
                    <option value="Artigas">Artigas</option>
                    <option value="Paysandu">Paysandú</option>
                    <option value="Río Negro">Río Negro</option>
                    <option value="Soriano">Soriano</option>
                    <option value="Colonia">Colonia</option>
                    <option value="Maldonado">Maldonado</option>
                    <option value="Rocha">Rocha</option>
                    <option value="Lavalleja">Lavalleja</option>
                    <option value="Flores">Flores</option>
                    <option value="Florida">Florida</option>
                    <option value="Durazno">Durazno</option>
                    <option value="Cerro Largo">Cerro Largo</option>
                    <option value="Treinta y Tres">Treinta y Tres</option>
                    <option value="San José">San José</option>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="almacenes" data-value="direccion">Direccion:</label>
                <input type="text" name="Direccion" value="<?=$Direccion?>" required>
            </div>
            <input type="submit" value="Modificar" class="btn" data-section="boton" data-value="modificar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="almacen_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>