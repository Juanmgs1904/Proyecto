<?php
require("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Camionero</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body class="fondo">
    <?php
    $ciC = $_GET['ciC'];
    $fechaVL = $_GET['fechaVL'];
    $turno = $_GET['turno'];
    ?>
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info">
                <label>CI:</label>
                <input type="text" name="ciC" value="<?= $ciC ?>" readonly>
            </div>
            <div class="form_info">
                <label class="fechaV">Fecha Vencimiento Licencia</label>
                <input type="date" name="fechaVL" value="<?= $fechaVL ?>" required>
            </div>
            <div class="form_info">
                <label>Turno</label>
                <select name="Turno">
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noche">Noche</option>
                </select>
            </div>
            <input type="submit" value="Modificar" class="btn">
        </form>
    </div>
    <div class="btn_volver">
        <a href="camionero_index.php" class="btn">Volver</a>
    </div>
</body>

</html>