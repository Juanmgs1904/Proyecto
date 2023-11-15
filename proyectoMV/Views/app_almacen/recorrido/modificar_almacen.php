<?php
require("../../../Model/session/session_almacen2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Almacén</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    $IDA = $_GET['IDA'];
    $IDR = $_GET['IDR'];
    $distancia = $_GET['distancia'];
    $idA = $_GET['idA'];
    $mostrar = $_GET['mostrar'];
    ?>
    <div class="title">
        <h1 data-section="modificarAR" data-value="title">Modificar Distancia del Recorrido</h1>
    </div>
    <?php echo '<form action="../../../intermediario/putDataAPI.php?idA=' . $idA . '&mostrar=' . $mostrar . '" class="form" method="POST">'; ?>
    <h3 class="form__title" data-section="modificarAR" data-value="text">Ingrese datos</h3>
    <div class="text">
        <label><b data-section="modificarAR" data-value="idR">ID del Recorrido:</b></label>
        <input type="text" name="IDR" class="input" value="<?= $IDR ?>" readonly>
    </div>
    <div class="text">
        <label><b data-section="modificarAR" data-value="idA">ID del Almacén:</b></label>
        <input type="text" name="IDA" class="input" value="<?= $IDA ?>" readonly>
    </div>
    <div class="text">
        <label><b data-section="modificarAR" data-value="distancia">Distancia:</b></label>
        <input type="time" name="distancia" class="input" value="<?= $distancia ?>" required>
    </div>
    <input type="submit" value="Modificar" class="boton_form" data-section="modificarAR" data-value="btn">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="almacenes.php?idA=' . $idA . '&IDR=' . $IDR . '&mostrar=' . $mostrar . '" class="btn" data-section="modificarAR" data-value="btnV">' . "Volver" . ' </a>';
        ?>
    </div>
    <script src="script.js"></script>
</body>

</html>