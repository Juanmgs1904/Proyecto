<?php
require ("../../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Camión</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <?php
    $Matricula = $_GET['Matricula'];
    $Peso = $_GET['Peso'];
    $Alto = $_GET['Alto'];
    $Ancho = $_GET['Ancho'];
    $Largo = $_GET['Largo'];
    $Tipo = $_GET['Tipo'];
    ?>
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info">
                <label>Matricula:</label> 
                <input type="text" name="Matricula" value="<?=$Matricula?>" readonly>
            </div>
            <div class="form_info">
                <label>Peso:</label>
                <input type="text" name="Peso" value="<?=$Peso?>">
            </div>
            <div class="form_info">
                <label>Alto:</label>
                <input type="text" name="Alto" value="<?=$Alto?>">
            </div>
            <div class="form_info">
                <label>Ancho</label>
                <input type="text" name="Ancho" value="<?=$Ancho?>">
            </div>
            <div class="form_info">
                <label>Largo:</label>
                <input type="text" name="Largo" value="<?=$Largo?>">
            </div>
            <div class="form_info">
                <label>Tipo</label>
                <input type="text" name="Tipo" value="<?=$Tipo?>">
            </div>
            <input type="submit" value="Modificar" class="btn">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="camion_index.php" class="btn">Volver</a>
    </div>
</body>
</html>