<?php
$empresa = $_GET['empresa'];
$url = 'http://localhost/proyecto/controller/almacen/C_lotesAPE.php?empresa='.$empresa.'';
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
        <h1>ASIGNAR PAQUETES A LOTES</h1>
    </div>
    <?php echo '<form action="../../../intermediario/postDataAPI.php?empresa='.$empresa.'" method="post" class="form">'; ?>
        <h3 class="form__title">Ingrese datos</h3>
        <div class="text">
            <label><b>ID del Lote:</b></label>
            <select name="IDLE">
                <?php
                foreach ($array as $fila) {
                    echo '<option value="' . $fila['IDL'] . '">' . $fila['IDL'] . '</option>';
                }
                ?>
            </select>
        </div>

        <?php
        $url = 'http://localhost/proyecto/controller/almacen/C_paquetesALE.php?empresa='.$empresa.'';
        require("../../../intermediario/getDataAPI.php");    
        ?>
        <div class="text">
            <label><b>Codigo:</b></label>
            <select name="codigoE">
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
            <?php  echo '<a href="almacenExterno.php?empresa='.$empresa.'" class="btn">'; ?>Volver</a>
        </div>
        <div class="btn_tabla">
            <?php echo '<a href="tablas/tabla_asignarPALE.php?empresa='.$empresa.'" class="btn">'; ?>Ver Tabla</a>
        </div>
    </div>

</body>

</html>