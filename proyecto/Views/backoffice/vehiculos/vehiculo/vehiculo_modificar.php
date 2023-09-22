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
    $MatriculaV = $_GET['MatriculaV'];
    $Estado = $_GET['Estado'];
    $Disponibilidad = $_GET['Disponibilidad'];
    ?>
    <div class="contenedor_form">
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info">
                <label>Matricula:</label> 
                <input type="text" name="MatriculaV" value="<?=$MatriculaV?>" readonly>
            </div>
            <div class="form_info">
            <label>Estado:</label>
                <select name="Estado">
                    <option value="En buen estado">En buen estado</option>
                    <option value="En mal estado">En mal estado</option>
                </select>
            </div>
            <div class="form_info">
            <label>Disponibilidad:</label>
                <select name="Disponibilidad">
                    <option value="Disponible">Disponible</option>
                    <option value="En ruta">En ruta</option>
                </select>
            </div>
            <input type="submit" value="Modificar" class="btn">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="camion_index.php" class="btn">Volver</a>
    </div>
</body>
</html>