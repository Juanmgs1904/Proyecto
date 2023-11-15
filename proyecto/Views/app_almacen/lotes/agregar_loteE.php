<?php
$empresa = $_GET['empresa'];
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
        <h1 data-section="agregarLC" data-value="title">Agregar Lote al Almacén</h1>
    </div>
    <?php echo '<form action="../../../intermediario/postDataAPI.php?empresa='.$empresa.'" class="form" method="post">'; ?>
        <h3 class="form__title" data-section="agregarLC" data-value="text">Ingrese datos</h3>
        <div class="text">
            <label><b data-section="agregarLC" data-value="tiempoEstimado">Tiempo Estimado:</b></label>
            <input type="datetime-local" name="tiempoEstimadoE" class="input" placeholder="Ingrese la Fecha de Entrega" require>
        </div>
            <input type="hidden" name="almacenExterno" value="<?= '1' ?>">
            <button type="submit" class="boton_form"><b data-section="agregarLC" data-value="btn">Agregar</b></button>
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="lotesE.php?empresa='.$empresa.'" class="btn" data-section="agregarLC" data-value="btnV">Volver</a>';
        ?>
    </div>
    <script src="script.js"></script>
</body>

</html>