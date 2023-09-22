<?php
require("../../Model/session/session_camioneta.php");

$url = 'http://localhost/proyecto/controller/transito/C_camionetas.php';
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
    <h1 class="text-center titulo">Aviso Entrega</h1>
    <form action="../../intermediario/putDataAPI.php" method="post" class="form">
        <h2 class="form__titulo text-center">Ingrese Datos</h2>
        <div class="datos">
            <p>Matricula:</p>
            <select name="MatriculaC">
                <?php
                $matriculasMostradas = array();
                foreach ($array as $fila) {
                    $matriculaC = $fila['MatriculaC'];
                    if (!in_array($matriculaC, $matriculasMostradas)) {
                        // Si no se ha mostrado, muestra la matrícula y agrega al array
                        $matriculasMostradas[] = $matriculaC;
                        echo '<option value="' . $fila['MatriculaC'] . '">' . $fila['MatriculaC'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <?php
        $url = 'http://localhost/proyecto/controller/transito/C_paquetes.php';
        require("../../intermediario/getDataAPI.php");
        ?>
        <div class="datos">
            <p>Codigo:</p>
            <select name="codigoE">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['codigo'] . '">' . $fila['codigo'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form__btn">
            <input type="submit" value="Marcar Entrega" class="btn">
        </div>
    </form>
    <div class="btn_volver">
        <a href="indexCamioneta.php" class="boton">Volver</a>
    </div>
</body>

</html>