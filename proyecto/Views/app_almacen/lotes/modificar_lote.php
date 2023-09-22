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
    $ruta = $_GET['ruta'];
    $tiempoEstimado = $_GET['tiempoEstimado'];
    $idI = $_GET['idI'];
    $idA = $_GET['idA'];
    ?>
    <div class="title">
        <h1>Modificar Lote del Almacén</h1>
    </div>
    <form action="../../../intermediario/putDataAPI.php" class="form" method="post" >
        <h3 class="form__title">Ingrese datos</h3>
        <div class="info">
            <h3>ID:</h3>
            <input type="text" name="id" class="input" value="<?= $id ?>" readonly>
        </div>
        <div class="info">
            <h3>Peso:</h3>
            <input type="text" name="peso" class="input" placeholder="Ingrese el Peso" value="<?= $peso ?>">
        </div>
        <div class="info">
            <h3>Estado:</h3>
            <select name="estado">
                <option value="<?= $estado ?>"><?= $estado ?></option>
                <option value="No Asignado">No Asignado</option>
                <option value="Asignado">Asignado</option>
                <option value="Entregado">Entregado</option>
            </select>
        </div>
        <div class="info">
            <h3>Destino:</h3>
            <input type="text" name="destino" class="input" value="<?= $destino ?>">
        </div>
        <div class="info">
            <h3>Ruta:</h3>
            <input type="text" name="ruta" class="input" placeholder="Ingrese la Ruta" value="<?= $ruta ?>">
        </div>
        <div class="info">
            <h3>Tiempo Estimado:</h3>
           <input type="datetime-local" name="tiempoEstimado" class="input" placeholder="Ingrese el Tiempo Estimado" value="<?=$tiempoEstimado?>" required>
        </div>
        <div class="info">
            <h3>ID Almacén:</h3>
            <input type="text" name="idI" class="input" placeholder="Ingrese el Almacén" value="<?= $idI ?>">
        </div>
        <input type="hidden" name="idA" value="<?= $idA ?>">
        <input type="submit" value="Modificar" class="boton_form">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="lote.php?idA=' . $idA . '&id='. $id .'" class="btn">' . "Volver" . ' </a>';
        ?>
    </div>
</body>

</html>