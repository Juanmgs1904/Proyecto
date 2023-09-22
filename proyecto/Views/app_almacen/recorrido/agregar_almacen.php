<?php
require ("../../../Model/session/session_almacen2.php");
$IDR = $_GET['IDR'];
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
        <h1>Agregar Almacén al Recorrido</h1>
    </div>
    <form action="../../../intermediario/postDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>

        <div class="info">
            <h3>ID del Recorrido:</h3>
            <input type="number" name="IDR" class="input" value="<?= $IDR ?>" readonly>
        </div>

        <?php
        $url = 'http://localhost/proyecto/controller/almacen/C_almacenI.php';
        require("../../../intermediario/getDataAPI.php");
?>
        <div class="info">
            <h3>ID del Almacen:</h3>
            <select name="IDA">
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
        echo '<a href="almacenes.php?IDR=' . $IDR . '" class="btn">' . "Volver" . ' </a>';
        ?>
        
    </div>
</body>
</html>