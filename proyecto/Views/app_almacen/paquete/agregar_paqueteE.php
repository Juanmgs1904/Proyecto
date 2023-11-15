<?php
$empresa = $_GET['empresa'];
require("../../../Model/session/session_almacen2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paquete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="title">
        <h1 data-section="agregarP" data-value="title">Agregar Paquete al Almacén</h1>
    </div>
    <?php echo '<form action="../../../intermediario/postDataAPI.php?empresa='.$empresa.'" class="form" method="post">'; ?>
        <h3 class="form__title" data-section="agregarAR" data-value="text">Ingrese datos</h3>
        <div class="text">
            <label><b data-section="paquetesC" data-value="peso">Peso:</b></label>
            <input data-section="agregarP" data-value="phPeso" type="text" name="pesoE" class="input" placeholder="Ingrese el Peso" required>
        </div>
        <div class="text">
            <label><b data-section="paqueteC" data-value="fechaE">Fecha de Entrega:</b></label>
            <input type="date" name="fEntregaE" class="input" placeholder="Ingrese la Fecha de Entrega" require>
        </div>
        <div class="text">
            <label><b data-section="paqueteC" data-value="destinatario">Destinatario:</b></label>
            <input data-section="agregarP" data-value="phDestinatario" type="text" name="DestinatarioE" class="input" placeholder="Destinatario" required>
        </div>
        <div class="text">
            <label><b data-section="paqueteC" data-value="destino">Destino:</b></label>
            <input data-section="agregarP" data-value="phDestino" type="text" name="DestinoE" class="input" placeholder="Destino">
        </div>
        <div class="text">
            <label><b data-section="paqueteC" data-value="departamento">Departamento:</b></label>
            <select name="departamento">
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
        <button type="submit" class="boton_form"><b data-section="agregarLC" data-value="btn">Agregar</b></button>
    </form>
    <div class="btn_volver">
        <?php
        echo '<a href="paquetesE.php?empresa='.$empresa.'" class="btn" data-section="paqueteC" data-value="btnV">' . "Volver" . ' </a>';
        ?>

    </div>
    <script src="script.js"></script>
</body>

</html>