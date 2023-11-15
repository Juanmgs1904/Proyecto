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
    $FechaVL = $_GET['FechaVL'];
    $Turno = $_GET['Turno'];
    ?>
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info text">
                <label>CI:</label>
                <input type="text" name="ciC" value="<?= $ciC ?>" readonly>
            </div>
            <div class="form_info text">
                <label class="fechaV" data-section="camionero" data-value="fecha">Fecha Vencimiento Licencia</label>
                <input type="date" name="FechaVL" value="<?= $FechaVL ?>" required>
            </div>

            <div class="form_info text">
                <label data-section="camionero" data-value="turno">Turno:</label>
                <select name="Turno" required>
                    <?php
                    echo '<option value="' . $Turno . '">' . $Turno . '</option>';
                    ?>
                    <option value="mañana" data-section="camionero" data-value="mañana">Mañana</option>
                    <option value="tarde" data-section="camionero" data-value="tarde">Tarde</option>
                    <option value="noche" data-section="camionero" data-value="noche">Noche</option>
                </select>
            </div>
            <input type="submit" value="Modificar" class="btn" data-section="boton" data-value="modificar">
        </form>
    </div>
    <div class="btn_volver">
        <a href="camionero_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>