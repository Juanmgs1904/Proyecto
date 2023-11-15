<?php
require("../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Lote</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="fondo">
    <?php
    $IDL = $_GET['IDL'];
    $Peso = $_GET['Peso'];
    $Estado = $_GET['Estado'];
    $Destino = $_GET['Destino'];
    $tiempoEstimado = $_GET['tiempoEstimado'];
    ?>
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../cambiar.php" method="post">
            <div class="form_info text">
                <label>ID:</label>
                <input type="number" name="IDL" value="<?= $IDL ?>" readonly>
            </div>
            <div class="form_info text">
                <label data-section="lote" data-value="peso">Peso:</label>
                <input type="number" name="Peso" value="<?= $Peso ?>" required>
            </div>
            <div class="form_info text">
                <label data-section="lote" data-value="estado">Estado:</label>
                <select name="Estado">
                    <?php
                    echo '<option value="' . $Estado . '">' . $Estado . '</option>';
                    ?>
                    <option value="noAsignado" data-section="lote" data-value="noAsignado">No Asignado</option>
                    <option value="asignado" data-section="lote" data-value="asignado">Asignado</option>
                    <option value="entregado" data-section="lote" data-value="entregado">Entregado</option>
                </select>
            </div>
            <div class="form_info text">
                <label data-section="lote" data-value="destino">Destino:</label>
                <select name="Destino">
                    <?php
                    echo '<option value="' . $Destino . '">' . $Destino . '</option>';
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
            <div class="form_info text">
                <label class="fechaN" data-section="lote" data-value="tiempoEstimado">Tiempo Estimado:</label>
                <input type="datetime-local" name="tiempoEstimado" value="<?= $tiempoEstimado ?>" required>
            </div>

            <input type="submit" value="Modificar" class="btn" data-section="boton" data-value="modificar">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="lote_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>