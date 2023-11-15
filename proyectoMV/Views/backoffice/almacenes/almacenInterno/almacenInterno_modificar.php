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
    $idI = $_GET['idI'];
    $ruta = $_GET['ruta'];
    ?>
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info text">
                <label>ID:</label>
                <input type="text" name="idI" value="<?=$idI?>" readonly>
            </div>
            <div class="form_info text">
                <label data-section="almacenes" data-value="ruta">Ruta:</label>
                <input type="text" name="ruta" value="<?=$ruta?>" required>
            </div>
            <input type="submit" value="Modificar" class="btn" data-section="boton" data-value="modificar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="almacenInterno_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>