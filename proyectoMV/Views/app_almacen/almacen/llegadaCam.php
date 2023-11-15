<?php
$idA = $_GET['idA'];
$ruta = true;
$url = 'localhost/Controller/almacen/C_va.php?ruta='.$ruta.'&idA='.$idA.'';
require("../../../intermediario/getDataAPI.php");

require("../../../Model/session/session_almacenInterno2.php");
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
        <h1 data-section="almacenI" data-value="op5">Marcar Hora de Llegada de Camionetas</h1>
    </div>
    <?php echo '<form action="../../../intermediario/postDataAPI.php?idA='.$idA.'" class="form" method="post">'; ?>
        <h3 class="form__title" data-section="agregarAR" data-value="text">Ingrese datos</h3>
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
        <div class="text">
            <label><b data-section="horaL" data-value="horaL">Hora de llegada:</b></label>
            <input type="datetime-local" name="fechaLlegada" class="input" placeholder="Ingrese hora" required>
        </div>
        <input data-section="horaL" data-value="btn" type="submit" value="Marcar" class="boton_form">
    </form>
    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="almacenInterno.php?idA='.$idA.'" class="btn" data-section="lotesC" data-value="btnV">'; ?>Volver</a>
        </div>
        <div class="btn_tabla">
            <?php echo '<a href="tablas/tabla_llegadaCam.php?idA='.$idA.'" class="btn" data-section="asignarLC" data-value="btnT">'; ?>Ver Tabla</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>