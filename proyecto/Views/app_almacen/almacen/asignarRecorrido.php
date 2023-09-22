<?php
$url = 'http://localhost/proyecto/controller/almacen/C_camiones.php';
require("../../../intermediario/getDataAPI.php");

require("../../../Model/session/session_almacen2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Asignar Recorrido a camiones</title>
</head>

<body>
    <div class="title">
        <h1>Asignar Recorrido a Camiones</h1>
    </div>
    <form action="../../../intermediario/postDataAPI.php" method="post" class="form">
        <h3 class="form__title">Ingrese datos</h3>
        <div class="datos">
            <p>Matricula:</p>
            <select name="MatriculaSig">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['Matricula'] . '">' . $fila['Matricula'] . '</option>';
                }
                ?>
            </select>
        </div>
        <?php
        $url = 'http://localhost/proyecto/controller/almacen/C_esta.php';
        require("../../../intermediario/getDataAPI.php");
        ?>
        <div class="datos">
            <p>ID del Recorrido:</p>
            <select name="IDR">
                <?php

                $IDRMostradas = array(); // Un array para hacer un seguimiento de las matrículas mostradas

                foreach ($array as $fila) {
                    $IDR = $fila['IDR'];

                    // Verifica si el recorrido ya se ha mostrado
                    if (!in_array($IDR, $IDRMostradas)) {
                        // Si no se ha mostrado, muestra el recorrido y agrega al array
                        $IDRMostradas[] = $IDR;
                        echo '<option value="' . $fila['IDR'] . '">' . $fila['IDR'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <input type="submit" value="Asignar Paquete" class="boton_form">
    </form>

    <div class="botones">
        <div class="btn_volver">
            <a href="almacenInterno.php" class="btn">Volver</a>
        </div>
        <div class="btn_tabla">
            <a href="tablas/tabla_recorrido.php" class="btn">Ver Tabla</a>
        </div>
    </div>

</body>

</html>