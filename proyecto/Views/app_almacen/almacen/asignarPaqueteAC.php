<?php
$ruta = false;
$idA = $_GET['idA'];
$url = 'http://localhost/proyecto/controller/almacen/C_va.php?idA='.$idA.'&ruta='.$ruta.'';
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
        <h1>Asignar Paquete a Camioneta</h1>
    </div>
    <?php
    echo '<form action="../../../intermediario/postDataAPI.php?idA='.$idA.'" method="post" class="form">';
    ?>
        <h3 class="form__title">Ingrese datos</h3>
        <div class="text">
            <label><b>Matricula:</b> </label>
            <select name="MatriculaC">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['MatriculaC'] . '">' . $fila['MatriculaC'] . '</option>';
                }
                ?>
            </select>
        </div>
        <?php
        $url = 'http://localhost/proyecto/controller/almacen/C_paquetesAC.php?idA='.$idA.'';
        require("../../../intermediario/getDataAPI.php");
        ?>
        <div class="text">
            <label><b> Codigo:</b></label>
            <select name="codigo">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['codigo'] . '">' . $fila['codigo'] . '</option>';
                }
                ?>
            </select>
        </div>

        <input type="submit" value="Asignar Paquete" class="boton_form">
    </form>

    <div class="botones">
        <div class="btn_volver">
            <?php
            echo '<a href="almacenInterno.php?idA='.$idA.'" class="btn">Volver</a>'; 
            ?>
        </div>
        <div class="btn_tabla">
            <?php
            echo '<a href="tablas/tabla_asignarPAC.php?idA='.$idA.'" class="btn">Ver Tabla</a>';
            ?>
        </div>
    </div>

</body>

</html>