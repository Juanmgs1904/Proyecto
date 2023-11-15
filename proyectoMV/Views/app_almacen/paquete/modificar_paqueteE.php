<?php
require("../../../Model/session/session_almacen2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Paquete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    $empresa = $_GET['empresa'];
    $codigo = $_GET['codigo'];
    $peso = $_GET['peso'];
    $estado = $_GET['estado'];
    $fRecibo = $_GET['fRecibo'];
    $fEntrega = $_GET['fEntrega'];
    $Destinatario = $_GET['Destinatario'];
    $Destino = $_GET['Destino'];
    $Departamento = $_GET['Departamento'];
    ?>
    <div class="title">
        <h1 data-section="modificarP" data-value="title">Modificar Paquete del Almacén</h1>
    </div>
    <?php echo '<form action="../../../intermediario/putDataAPI.php?empresa=' . $empresa . '" class="form" method="post">'; ?>
    <h3 class="form__title" data-section="agregarAR" data-value="text">Ingrese datos</h3>
    <input type="hidden" name="Estado" value="<?= $estado ?>">
    <div class="text">
        <label><b data-section="paqueteC" data-value="codigo">codigo:</b></label>
        <input type="text" name="codigo" class="input" value="<?= $codigo ?>" readonly>
    </div>
    <div class="text">
        <label><b data-section="paquetesC" data-value="peso">Peso:</b></label>
        <input data-section="agregarP" data-value="phPeso" placeholder="Ingrese el Peso" type="text" name="peso" class="input" value="<?= $peso ?>" required>
    </div>
    <input type="hidden" name="fRecibo" placeholder="Ingrese la fecha de recibo" class="input" value="<?= $fRecibo ?>" required>
    <div class="text">
        <label><b data-section="paqueteC" data-value="fechaE">Fecha de Entrega:</b></label>
        <input type="date" name="fEntrega" class="input" placeholder="Ingrese la fecha de Entrega" value="<?= $fEntrega ?>">
    </div>
    <div class="text">
        <label><b data-section="paqueteC" data-value="destinatario">Destinatario:</b></label>
        <input type="text" data-section="agregarP" data-value="phDestinatario" placeholder="Destinatario" name="destinatario" class="input" value="<?= $Destinatario ?>" required>
    </div>
    <div class="text">
        <label><b data-section="paqueteC" data-value="destino">Destino:</b></label>
        <input type="text" data-section="agregarP" data-value="phDestino" placeholder="Destino" name="destino" class="input" value="<?= $Destino ?>" required>
    </div>
    <div class="text">
        <label><b data-section="paqueteC" data-value="departamento">Departamento:</b></label>
        <select name="departamento">
            <?php echo '<option value="' . $Departamento . '">'; ?>
                <?php echo $Departamento ?>
            </option>
            <option value="$Departamento"><?php echo $Departamento; ?></option>
            <option value="Canelones">Canelones</option>
            <option value="Rivera">Rivera</option>
            <option value="Tacuarembo">Tacuarembó</option>
            <option value="Salto">Salto</option>
            <option value="Artigas">Artigas</option>
            <option value="Paysandu">Paysandú</option>
            <option value="Río Negro">Río Negro</option>
            <option value="Soriano">Soriano</option>
            <option value="Colonia">Colonia</option>
            <option value="Maldonado">Maldonado</option>
            <option value="Rocha">Rocha</option>
            <option value="Lavalleja">Lavalleja</option>
            <option value="Flores">Flores</option>
            <option value="Florida">Florida</option>
            <option value="Durazno">Durazno</option>
            <option value="Cerro Largo">Cerro Largo</option>
            <option value="Treinta y Tres">Treinta y Tres</option>
            <option value="San José">San José</option>
        </select>
    </div>
    <button type="submit" class="boton_form"><b data-section="loteC" data-value="modificar">Modificar</b></button>
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="paqueteE.php?codigo=' . $codigo . '&empresa=' . $empresa . '" class="btn" data-section="paqueteC" data-value="btnV">' . "Volver" . ' </a>';
        ?>
    </div>
    <script src="script.js"></script>
</body>

</html>