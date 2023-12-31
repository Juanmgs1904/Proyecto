<?php
require("../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar paquete</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="fondo">
    <?php
    $codigo = $_GET['codigo'];
    $Peso = $_GET['Peso'];
    $Estado = $_GET['Estado'];
    $fRecibo = $_GET['fRecibo'];
    $fEntrega = $_GET['fEntrega'];

    $Destinatario = $_GET['Destinatario'];
    $Destino = $_GET['Destino'];
    $Departamento = $_GET['Departamento'];
    ?>
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../cambiar.php" method="post">
            <div class="form_info text">
                <label data-section="paquete" data-value="codigo">Codigo:</label>
                <input type="number" name="codigo" value="<?= $codigo ?>" readonly>
            </div>
            <div class="form_info text">
                <label data-section="paquete" data-value="peso">Peso:</label>
                <input type="text" name="Peso" value="<?= $Peso ?>" required>
            </div>
            <div class="form_info text">
                <label data-section="paquete" data-value="estado">Estado:</label>
                <select name="Estado">
                    <?php
                    echo '<option value="' . $Estado . '">' . $Estado . '</option>';
                    ?>
                    <option value="enAlmacenExterno">En almacen externo</option>
                    <option value="loteExternoAsignado">Lote Externo Asignado</option>
                    <option value="enCentral">En Central</option>
                    <option value="loteAsignado">Lote Asignado</option>
                    <option value="loteDesarmado">Lote Desarmado</option>
                    <option value="camionetaAsignada">Camioneta Asignada</option>
                    <option value="entregado">Entregado</option>
                </select>
            </div>
            <div class="form_info text">
                <label class="fechaV" data-section="paquete" data-value="fechaRecibo">Fecha de recibo:</label>
                <input type="datetime-local" name="fRecibo" value="<?= $fRecibo ?>" required>
            </div>
            <div class="form_info text">
                <label class="fechaV" data-section="paquete" data-value="fechaEntrega">Fecha de entrega:</label>
                <input type="date" name="fEntrega" value="<?= $fEntrega ?>">
            </div>
            <div class="form_info text">
                <label data-section="paquete" data-value="destinatario">Destiantario:</label>
                <input type="text" name="Destinatario" value="<?= $Destinatario ?>" required>
            </div>
            <div class="form_info text">
                <label data-section="paquete" data-value="destino">Destino:</label>
                <input type="text" name="Destino" value="<?= $Destino ?>" required>
            </div>
            <div class="form_info text">
                <label data-section="paquete" data-value="departamento">Departamento:</label>
                <select name="Departamento">
                    <?php
                    echo '<option value="' . $Departamento . '">' . $Departamento . '</option>';
                    ?>
                    <option value="Montevideo">Montevideo</option>
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
            <input type="submit" value="Modificar" class="btn" data-section="boton" data-value="modificar">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="paquete_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>

    <script src="script.js"></script>
</body>

</html>