<?php
$matricula = $_GET['matricula'];
require("../../Model/session/session_camioneta.php");

$url = 'localhost/proyecto/Controller/transito/C_transporta.php?matricula='.$matricula.'';
require("../../intermediario/getDataAPI.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso Entrega</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="formulario">
    <h1 class="text-center titulo" data-section="seleccionar" data-value="op5">Aviso Entrega</h1>
    <?php echo '<form action="../../intermediario/putDataAPI.php?matricula='.$matricula.'" method="post" class="form">'; ?>
        <h2 class="form__titulo text-center" data-section="header" data-value="ingresar">Ingrese Datos</h2>
        <div class="text">
        <label><b data-section="paquete" data-value="codigo">Codigo:</b></label>
            <select name="codigoE">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['codigo'] . '">' . $fila['codigo'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form__btn">
            <input type="submit" value="Marcar Entrega" class="btn" data-section="boton" data-value="entregado">
        </div>
    </form>
    <div class="btn_volver">
        <?php echo '<a href="indexCamioneta.php?matricula='.$matricula.'" class="boton" data-section="boton" data-value="volver">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>