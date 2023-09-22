<?php
$url = 'http://localhost/proyecto/controller/almacen/C_camionetas.php';
require("../../../intermediario/getDataAPI.php");
require("../../../Model/session/session_almacenInterno2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Salida</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="title">
        <h1>Marcar Hora de Salida</h1>
    </div>
    <form action="../../../intermediario/postDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>
        <div class="datos">
            <p>Matricula:</p>
            <select name="MatriculaC">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['MatriculaC'] . '">' . $fila['MatriculaC'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="datos">
            <p>Hora de Salida:</p>
            <input type="datetime-local" name="fechaSalida" class="input" placeholder="Ingrese hora" required>
        </div>
        <input type="submit" value="Marcar" class="boton_form">
    </form>
    <div class="botones">
        <div class="btn_volver">
            <a href="almacenInterno.php" class="btn">Volver</a>
        </div>
        <div class="btn_tabla">
            <a href="tablas/tabla_salidaCam.php" class="btn">Ver Tabla</a>
        </div>
    </div>
</body>

</html>