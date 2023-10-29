<?php
require("../../../Model/session/session_almacen2.php");
$lotes = true;
$url = "http://localhost/proyecto/controller/almacen/C_vaHacia.php?lotes=$lotes";
require("../../../intermediario/getDataAPI.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Lote</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="title">
        <h1>Asignar Lote a Recorrido</h1>
    </div>
    <form action="../../../intermediario/postDataAPI.php" class="form" method="post">
        <h3 class="form__title">Ingrese datos</h3>
        <div class="text">
            <label><b>ID del Lote:</b></label>
            <select name="IDLL" required>
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['IDL'] . '">' . $fila['IDL'] . '</option>';
                }
                ?>
            </select>
        </div>
        <?php
        $url = "http://localhost/proyecto/controller/almacen/C_esta.php";
        require("../../../intermediario/getDataAPI.php");
        ?>
        <div class="text">
            <label><b>ID del Recorrido:</b></label>
            <select name="IDRL" required>
                <?php
                $recorridosMostrados = array(); // Un array para hacer un seguimiento de lo mostrado
                foreach ($array as $fila) {
                    $IDR = $fila['IDR'];
                    // Verifica si ya se ha mostrado
                    if (!in_array($IDR, $recorridosMostrados)) {
                        // Si no se ha mostrado, muestra y agrega al array
                        $recorridosMostrados[] = $IDR;
                        echo '<option value="' . $fila['IDR'] . '">' . $fila['IDR'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="text">
            <label><b>ID del Almacén:</b></label>
            <select name="IDAL" required>
                <?php
                $almacenesMostrados = array(); // Un array para hacer un seguimiento de lo mostrado
                foreach ($array as $fila) {
                    $IDA = $fila['IDA'];
                    // Verifica si ya se ha mostrado
                    if (!in_array($IDA, $almacenesMostrados)) {
                        // Si no se ha mostrado, muestra y agrega al array
                        $almacenesMostrados[] = $IDA;
                        echo '<option value="' . $fila['IDA'] . '">' . $fila['IDA'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <input type="submit" value="Asignar" class="boton_form">
    </form>
    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="lotes.php?idA=1" class="btn">Volver</a>'; ?>
        </div>
        <div class="btn_tabla">
            <?php echo '<a href="tabla_asignarLAR.php" class="btn">'; ?>Ver Tabla</a>
        </div>
    </div>
</body>

</html>