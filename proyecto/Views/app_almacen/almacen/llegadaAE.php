<?php
$url = 'http://localhost/proyecto/controller/almacen/C_camiones.php';
require("../../../intermediario/getDataAPI.php");

require("../../../Model/session/session_almacenExterno2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Llegada</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="title">
        <h1>Marcar Hora de Llegada</h1>
    </div>
    <form action="../../../intermediario/postDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>
        <div class="datos">
            <p>Matricula:</p>
            <select name="Matricula">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['Matricula'] . '">' . $fila['Matricula'] . '</option>';
                }
                ?>
            </select>
        </div>

        <?php
        $url = 'http://localhost/proyecto/controller/almacen/C_almacenE.php';
        require("../../../intermediario/getDataAPI.php");  
        ?>
        <div class="datos">
            <p>ID del Almacén:</p>
            <select name="idA">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['idE'] . '">' . $fila['idE'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="datos">
            <p>Hora de llegada:</p>
            <input type="datetime-local" name="fechaLlegada" class="input" placeholder="Ingrese hora" required>
        </div>
        <input type="submit" value="Marcar" class="boton_form">
    </form>
    <div class="botones">
        <div class="btn_volver">
            <a href="almacenExterno.php" class="btn">Volver</a>
        </div>
        <div class="btn_tabla">
            <a href="tablas/tabla_llegada.php" class="btn">Ver Tabla</a>
        </div>
    </div>
</body>

</html>