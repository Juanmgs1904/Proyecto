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
    $MatriculaC = $_GET['MatriculaC'];
    $Estado = $_GET['Estado'];
    $Peso = $_GET['Peso'];
    $Disponibilidad = $_GET['Disponibilidad'];
    ?>
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info">
                <label>Matricula:</label> 
                <input type="text" name="MatriculaC" value="<?=$MatriculaC?>" readonly>
            </div>
            <div class="form_info">
                <label>Estado:</label>
                <input type="text" name="Estado" value="<?=$Estado?>" required>
            </div>
            <div class="form_info">
                <label>Peso:</label>
                <input type="text" name="Peso" value="<?=$Peso?>">
            </div>
            <div class="form_info">
                <label>Disponibilidad</label>
                <input type="text" name="Disponibilidad" value="<?=$Disponibilidad?>" required>
            </div>
            <input type="submit" value="Modificar" class="btn">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="camioneta_index.php" class="btn">Volver</a>
    </div>
</body>
</html>