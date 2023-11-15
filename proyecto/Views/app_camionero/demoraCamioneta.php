<?php
$matricula = $_GET['matricula'];
require("../../Model/session/session_camioneta.php");

$url = 'localhost/proyecto/Controller/transito/C_camionetas.php';
require("../../intermediario/getDataAPI.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso Demora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="formulario">
    <h1 class="text-center titulo"  data-section="header" data-value="aviso">Aviso Demora</h1>
    <?php echo '<form action="../../intermediario/putDataAPI.php?matricula='.$matricula.'" method="POST" class="form">'; ?>
        <h2 class="form__titulo text-center"  data-section="header" data-value="ingresar">Ingrese Datos</h2>   
        <div class="datos_text">
            <p data-section="opcion" data-value="motivo">Motivo:</p>
            <textarea name="motivo" id="" cols="30" rows="10"></textarea>
        </div>     
        <div class="form__btn">
            <input type="submit" value="Avisar Demora" class="btn" data-section="boton" data-value="aviso">
        </div>

        

    </form>
    <div class="btn_volver">
        <?php echo '<a href="indexCamioneta.php?matricula='.$matricula.'" class="boton" data-section="boton" data-value="volver">'; ?>Volver</a>
    <script src="script.js"></script>
    </div>
</body>

</html>