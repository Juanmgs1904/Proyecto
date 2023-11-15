<?php
$idA = $_GET['idA'];
$ruta = false;
$externo = false;
$url = 'localhost/proyecto/Controller/almacen/C_camiones.php?ruta=' . $ruta . '&externo='.$externo.'';
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
    <title>Asignar Lotes a Camiones</title>
</head>

<body>
    <div class="title">
        <h1 data-section="asignarLAC" data-value="title">Asignar Lotes a Camiones</h1>
    </div>
    <?php echo '<form action="../../../intermediario/postDataAPI.php?idA=' . $idA . '" method="post" class="form">'; ?>
    <h3 class="form__title" data-section="modificarAR" data-value="text">Ingrese datos</h3>
    <div class="text">
        <label><b data-section="asignarLAC" data-value="matricula">Matricula:</b></label>
        <select name="Matricula">
            <?php
            foreach ($array as $fila) {
                echo '<option value="' . $fila['Matricula'] . '">' . $fila['Matricula'] . '</option>';
            }
            ?>
        </select>
    </div>
    <?php
    $url = 'localhost/proyecto/Controller/almacen/C_lotesAC.php';
    require("../../../intermediario/getDataAPI.php");
    ?>
    <div class="text">
        <label><b data-section="asignarLC" data-value="idL">ID del Lote:</b></label>
        <select name="IDL">
            <?php
            foreach ($array as $fila) {
                echo '<option value="' . $fila['IDL'] . '">' . $fila['IDL'] . '</option>';
            }
            ?>
        </select>
    </div>
    <input data-section="asignarLAC" data-value="btn" type="submit" value="Asignar Lote" class="boton_form">
    </form>

    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="almacenInterno.php?idA=' . $idA . '" class="btn" data-section="lotesC" data-value="btnV">'; ?>Volver</a>
        </div>
        <div class="btn_tabla">
            <?php echo '<a href="tablas/tabla_asignarLAC.php?idA=' . $idA . '" class="btn" data-section="asignarLC" data-value="btnT">'; ?>Ver Tabla</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>