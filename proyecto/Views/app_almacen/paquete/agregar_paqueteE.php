<?php
$empresa = $_GET['empresa'];
require("../../../Model/session/session_almacen2.php");
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
    <?php echo '<form action="../../../intermediario/postDataAPI.php?empresa='.$empresa.'" class="form" method="post">'; ?>
        <h3 class="form__title">Ingrese datos</h3>
        <div class="text">
            <label><b>Peso:</b></label>
            <input type="text" name="pesoE" class="input" placeholder="Ingrese el Peso" required>
        </div>
        <div class="text">
            <label><b>Fecha de Entrega:</b></label>
            <input type="date" name="fEntregaE" class="input" placeholder="Ingrese la Fecha de Entrega" require>
        </div>
        <div class="text">
            <label><b>Destinatario:</b></label>
            <input type="text" name="DestinatarioE" class="input" placeholder="Destinatario" required>
        </div>
        <div class="text">
            <label><b>Destino:</b></label>
            <input type="text" name="DestinoE" class="input" placeholder="Destino">
        </div>
        <input type="submit" value="Agregar" class="boton_form">
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="paquetesE.php?empresa='.$empresa.'" class="btn">' . "Volver" . ' </a>';
        ?>

    </div>
</body>

</html>