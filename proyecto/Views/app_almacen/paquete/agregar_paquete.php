<?php
require("../../../Model/session/session_almacen2.php");
$idA = $_GET['idA'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paquete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="title">
        <h1>Agregar Paquete al Almacén</h1>
    </div>
    <form action="../../../intermediario/postDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>
        <div class="text">
            <label><b>Peso:</b></label>
            <input type="text" name="peso" class="input" placeholder="Ingrese el Peso" required>
        </div>
        <div class="text">
            <label><b>Fecha de Recibo:</b></label>
            <input type="datetime-local" name="fRecibo" class="input" placeholder="Ingrese la Fecha de recibo" required>
        </div>
        <div class="text">
            <label><b>Fecha de Entrega:</b></label>
            <input type="date" name="fEntrega" class="input" placeholder="Ingrese la Fecha de Entrega" require>
        </div>
        <div class="text">
            <label><b>Destinatario:</b></label>
            <input type="text" name="Destinatario" class="input" placeholder="Destinatario" required>
        </div>
        <div class="text">
            <label><b>Destino:</b></label>
            <input type="text" name="Destino" class="input" placeholder="Destino">
        </div>
        <input type="submit" value="Agregar" class="boton_form">
        <input type="hidden" name="idA" value="<?= $idA ?>">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="paquetes.php?id=' . $idA . '" class="btn">' . "Volver" . ' </a>';
        ?>

    </div>
</body>

</html>