<?php
require("../../../Model/session/session_almacen2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Paquete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    $codigo = $_GET['codigo'];
    $peso = $_GET['peso'];
    $estado = $_GET['estado'];
    $fRecibo = $_GET['fRecibo'];
    $fEntrega = $_GET['fEntrega'];
    $Destinatario = $_GET['Destinatario'];
    $Destino = $_GET['Destino'];
    $idA = $_GET['idA'];
    ?>
    <div class="title">
        <h1>Modificar Paquete del Almacén</h1>
    </div>
    <form action="../../../intermediario/putDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>
        <div class="info">
            <h3>codigo:</h3>
            <input type="text" name="codigo" class="input" value="<?= $codigo ?>" readonly>
        </div>
        <div class="info">
            <h3>Peso:</h3>
            <input type="text" name="peso" class="input" placeholder="Ingrese el Peso" value="<?= $peso ?>" required>
        </div>
        <div class="info">
        <h3>Estado:</h3>
                <select name="estado">
                    <option value="No Asignado">No Asignado</option>
                    <option value="LoteAsignado">Lote Asignado</option>
                    <option value="CamionetaAsignada">Camioneta Asignada</option>
                    <option value="Entregado">Entregado</option>
                </select>
        </div>
        <div class="info">
            <h3>Fecha de Recibo:</h3>
            <input type="date" name="fRecibo" placeholder="Ingrese la fecha de recibo" class="input" value="<?= $fRecibo ?>" readonly required>
        </div>
        <div class="info">
            <h3>Fecha de Entrega:</h3>
            <input type="date" name="fEntrega" class="input" placeholder="Ingrese la fecha de Entrega" value="<?= $fEntrega ?>">
        </div>
        <div class="info">
            <h3>Destinatario:</h3>
            <input type="text" name="destinatario" placeholder="Destinatario" class="input" value="<?= $Destinatario ?>" readonly required>
        </div>
        <div class="info">
            <h3>Destino:</h3>
            <input type="text" name="destino" class="input" placeholder="Destino" value="<?= $Destino ?>" readonly>
        </div>
        <input type="submit" value="Modificar" class="boton_form">
        <input type="hidden" name="idA" value="<?= $idA ?>">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="paquete.php?idA=' . $idA . '&codigo='. $codigo .'" class="btn">' . "Volver" . ' </a>';
        ?>
    </div>
</body>

</html>