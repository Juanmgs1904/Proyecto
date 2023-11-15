<?php
require ("../../../../Model/session/session_administrador3.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Personal</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="fondo">
    <?php
    $ciP = $_GET['ciP'];
    $cargo = $_GET['cargo'];
    $fechaN = $_GET['fechaN'];
    ?>
    <div class="contenedor_form">
        <h1 data-section="header" data-value="ingresar">Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info text">
                <label>CI:</label>
                <input type="text" name="ciP" value="<?=$ciP?>" readonly>
            </div>
            <div class="form_info text">
                <label data-section="personal" data-value="cargo">Cargo:</label>
                <input type="text" name="cargo" value="<?=$cargo?>" required>
            </div>
            <div class="form_info text">
                <label class="fechaN" data-section="personal" data-value="fecha">Fecha de Nacimiento:</label>
                <input type="date" name="fechaN" value="<?=$fechaN?>" required>
            </div>
            <input type="submit" value="Modificar" class="btn" data-section="boton" data-value="modificar">
            </table>
        </form>
    </div>
    <div class="btn_volver">
        <a href="personal_index.php" class="btn" data-section="boton" data-value="volver">Volver</a>
    </div>
    <script src="script.js"></script>
</body>
</html>