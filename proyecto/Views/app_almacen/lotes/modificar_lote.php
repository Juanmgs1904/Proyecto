<?php
require("../../../Model/session/session_almacen2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Lote</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    $id = $_GET['id'];
    $peso = $_GET['peso'];
    $estado = $_GET['estado'];
    $destino = $_GET['destino'];
    $tiempoEstimado = $_GET['tiempoEstimado'];
    $idA = $_GET['idA'];
    ?>
    <div class="title">
        <h1>Modificar Lote del Almacén</h1>
    </div>
    <form action="../../../intermediario/putDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>
        <!-- Vertical -->
        <div class="text">
            <label><b>ID:</b></label>
            <input type="text" name="id" class="input" value="<?= $id ?>" readonly>
        </div>
        <input type="text" name="peso" value="<?= $peso ?>" hidden>
        <div class="text">
            <label><b>Destino:</b></label>
            <input type="text" name="destino" class="input" value="<?= $destino ?>">
        </div>
        <div class="text">
            <label><b>Tiempo Estimado:</b></label>
            <input type="datetime-local" name="tiempoEstimado" class="input" placeholder="Ingrese el Tiempo Estimado" value="<?= $tiempoEstimado ?>" required>
        </div>
        <input type="hidden" name="idA" value="<?= $idA ?>">

        <input type="hidden" name="estado" value="<?= $estado ?>">
        <input type="submit" value="Modificar" class="boton_form">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="lote.php?idA=' . $idA . '&id=' . $id . '" class="btn">' . "Volver" . ' </a>';
        ?>
    </div>
</body>

</html>