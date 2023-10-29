<?php
require("../../../../Model/session/session_administrador3.php");
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
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info text">
                <label data-section="vehiculo" data-value="matricula">Matricula:</label>
                <input type="text" name="MatriculaV" value="<?= $MatriculaV ?>" readonly>
            </div>
            <div class="form_info text">
                <label data-section="vehiculo" data-value="estado">Estado:</label>
                <select name="Estado">
                    <?php
                    echo '<option value="' . $Estado . '">' . $Estado . '</option>';
                    ?>
                    <option value="buenEstado" data-section="vehiculo" data-value="mal">En buen estado</option>
                    <option value="malEstado" data-section="vehiculo" data-value="buen">En mal estado</option>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="vehiculo" data-value="disponibilidad">Disponibilidad:</label>
                <select name="Disponibilidad">
                    <?php
                    echo '<option value="' . $Disponibilidad . '">' . $Disponibilidad . '</option>';
                    ?>
                    <option value="disponible" data-section="vehiculo" data-value="disponible">Disponible</option>
                    <option value="enRuta" data-section="vehiculo" data-value="enRuta">En ruta</option>
                </select>
            </div>
            <input type="submit" value="Modificar" class="btn" data-section="boton" data-value="modificar">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="vehiculo_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>