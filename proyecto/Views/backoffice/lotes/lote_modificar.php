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
        <h1>Ingresar Datos</h1>
        <form class="form" action="../cambiar.php" method="post">
            <div class="form_info text">
                <label>ID:</label>
                <input type="number" name="IDL" value="<?= $IDL ?>" readonly>
            </div>
            <div class="form_info text">
                <label>Peso:</label>
                <input type="number" name="Peso" value="<?= $Peso ?>" required>
            </div>
            <div class="form_info text">
                <label>Estado:</label>
                <select name="Estado">
                    <?php
                    echo '<option value="' . $Estado . '">' . $Estado . '</option>';
                    ?>
                    <option value="noAsignado">No Asignado</option>
                    <option value="asignado">Asignado</option>
                    <option value="entregado">Entregado</option>
                </select>
            </div>
            <div class="form_info text">
                <label>Destino:</label>
                <input type="text" name="Destino" value="<?= $Destino ?>" required>
            </div>
            <div class="form_info text">
                <label class="fechaN">Tiempo Estimado:</label>
                <input type="datetime-local" name="tiempoEstimado" value="<?= $tiempoEstimado ?>" required>
            </div>

            <input type="submit" value="Modificar" class="btn">
        </form>
    </div>
    <div class="btn_tabla">
        <a href="lote_index.php" class="btn">Volver</a>
    </div>
</body>

</html>