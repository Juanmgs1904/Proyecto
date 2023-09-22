<?php
require("../../../Model/session/session_almacen2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Lote</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="title">
        <h1>Agregar Lote al Almacén</h1>
    </div>
    <form action="../../../intermediario/postDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>
        <input type="text" name="Destino" class="input" placeholder="Ingrese el Destino" required>
        <input type="text" name="Ruta" class="input" placeholder="Ingrese la Ruta" required>
        <?php
        $url = 'http://localhost/proyecto/controller/almacen/C_almacenI.php';
        require("../../../intermediario/getDataAPI.php");
        ?>

        <div class="info">
            <p class="info__text"><b>Tiempo Estimado:</b></p>
            <input type="datetime-local" name="tiempoEstimado" class="input" placeholder="Ingrese el Tiempo Estimado" required>
        </div>
        <div class="info">
            <p class="info__text"><b>ID del Almacen:</b></p>
            <select name="idI">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['idI'] . '">' . $fila['idI'] . '</option>';
                }
                ?>
            </select>
        </div>
        <input type="submit" value="Agregar" class="boton_form">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="lotes.php?id=1" class="btn">Volver</a>';
        ?>
    </div>
</body>

</html>