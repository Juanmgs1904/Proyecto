<?php
$empresa = $_GET['empresa'];
$url = 'localhost/proyecto/Controller/almacen/C_lotesAPE.php?empresa='.$empresa.'';
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
    <title>ASIGNAR PAQUETES A LOTES</title>
</head>

<body>
    <div class="title">
        <h1 data-section="lotesC" data-value="title">ASIGNAR PAQUETES A LOTES</h1>
    </div>
    <?php echo '<form action="../../../intermediario/postDataAPI.php?empresa='.$empresa.'" method="post" class="form">'; ?>
        <h3 class="form__title" data-section="modificarAR" data-value="text">Ingrese datos</h3>
        <div class="text">
            <label><b data-section="asignarLC" data-value="idL">ID del Lote:</b></label>
            <select name="IDLE">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['IDL'] . '">' . $fila['IDL'] . '</option>';
                }
                ?>
            </select>
        </div>

        <?php
        $url = 'localhost/proyecto/Controller/almacen/C_paquetesALE.php?empresa='.$empresa.'';
        require("../../../intermediario/getDataAPI.php");    
        ?>
        <div class="text">
            <label><b data-section="paquetesC" data-value="codigo">Codigo:</b></label>
            <select name="codigoE">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['codigo'] . '">' . $fila['codigo'] . '</option>';
                }
                ?>
            </select>
        </div>
        <input data-section="asignarPL" data-value="title" type="submit" value="Asignar Paquete" class="boton_form">
    </form>

    <div class="botones">
        <div class="btn_volver">
            <?php  echo '<a href="almacenExterno.php?empresa='.$empresa.'" class="btn" data-section="lotesC" data-value="btnV">'; ?>Volver</a>
        </div>
        <div class="btn_tabla">
            <?php echo '<a href="tablas/tabla_asignarPALE.php?empresa='.$empresa.'" class="btn" data-section="asignarLC" data-value="btnT">'; ?>Ver Tabla</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>