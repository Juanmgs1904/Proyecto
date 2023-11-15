<?php
$ruta = false;
$idA = $_GET['idA'];
$url = 'localhost/Controller/almacen/C_va.php?idA='.$idA.'&ruta='.$ruta.'';
require("../../../intermediario/getDataAPI.php");

require("../../../Model/session/session_almacenInterno2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Asignar Paquete a Camioneta</title>
</head>

<body>
    <div class="title">
        <h1 data-section="asignarPCam" data-value="title">Asignar Paquete a Camioneta</h1>
    </div>
    <?php
    echo '<form action="../../../intermediario/postDataAPI.php?idA='.$idA.'" method="post" class="form">';
    ?>
        <h3 class="form__title" data-section="modificarAR" data-value="text">Ingrese datos</h3>
        <div class="text">
            <label><b data-section="asignarLAC" data-value="matricula">Matricula:</b></label>
            <select name="MatriculaC">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['MatriculaC'] . '">' . $fila['MatriculaC'] . '</option>';
                }
                ?>
            </select>
        </div>
        <?php
        $url = 'localhost/Controller/almacen/C_paquetesAC.php?idA='.$idA.'';
        require("../../../intermediario/getDataAPI.php");
        ?>
        <div class="text">
            <label><b data-section="paqueteC" data-value="codigo">Codigo:</b></label>
            <select name="codigo">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['codigo'] . '">' . $fila['codigo'] . '</option>';
                }
                ?>
            </select>
        </div>

        <input data-section="asignarPL" data-value="btn" type="submit" value="Asignar Paquete" class="boton_form">
    </form>

    <div class="botones">
        <div class="btn_volver">
            <?php
            echo '<a href="almacenInterno.php?idA='.$idA.'" class="btn" data-section="modificarAR" data-value="btnV">Volver</a>'; 
            ?>
        </div>
        <div class="btn_tabla">
            <?php
            echo '<a href="tablas/tabla_asignarPAC.php?idA='.$idA.'" class="btn" data-section="asignarLC" data-value="btnT">Ver Tabla</a>';
            ?>
        </div>
    </div>
    <script src="script.js""></script>
</body>

</html>