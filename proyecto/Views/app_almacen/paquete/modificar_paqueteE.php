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
    $empresa = $_GET['empresa'];
    $codigo = $_GET['codigo'];
    $peso = $_GET['peso'];
    $estado = $_GET['estado'];
    $fRecibo = $_GET['fRecibo'];
    $fEntrega = $_GET['fEntrega'];
    $Destinatario = $_GET['Destinatario'];
    $Destino = $_GET['Destino'];
    ?>
    <div class="title">
        <h1>Modificar Paquete del Almacén</h1>
    </div>
    <?php echo '<form action="../../../intermediario/putDataAPI.php?empresa='.$empresa.'" class="form" method="post">'; ?>
        <h3 class="form__title">Ingrese datos</h3>
        <input type="hidden" name="Estado" value="<?= $estado ?>">
        <div class="text">
            <label><b>codigo:</b></label>
            <input type="text" name="codigo" class="input" value="<?= $codigo ?>" readonly>
        </div>
        <div class="text">
            <label><b>Peso:</b></label>
            <input type="text" name="peso" class="input" placeholder="Ingrese el Peso" value="<?= $peso ?>" required>
        </div>
        <input type="hidden" name="fRecibo" placeholder="Ingrese la fecha de recibo" class="input" value="<?= $fRecibo ?>" required>
        <div class="text">
            <label><b>Fecha de Entrega:</b></label>
            <input type="date" name="fEntrega" class="input" placeholder="Ingrese la fecha de Entrega" value="<?= $fEntrega ?>">
        </div>
        <div class="text">
            <label><b>Destinatario:</b></label>
            <input type="text" name="destinatario" placeholder="Destinatario" class="input" value="<?= $Destinatario ?>" required>
        </div>
        <div class="text">
            <label><b>Destino:</b></label>
            <input type="text" name="destino" class="input" placeholder="Destino" value="<?= $Destino ?>" required>
        </div>

        <input type="submit" value="Modificar" class="boton_form">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="paqueteE.php?codigo='. $codigo .'&empresa='.$empresa.'" class="btn">' . "Volver" . ' </a>';
        ?>
    </div>
</body>

</html>