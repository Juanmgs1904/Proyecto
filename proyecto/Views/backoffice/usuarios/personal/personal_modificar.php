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
        <h1>Ingresar Datos</h1>
        <form class="form" action="../../cambiar.php" method="post">
            <div class="form_info">
                <label>CI:</label>
                <input type="text" name="ciP" value="<?=$ciP?>" readonly>
            </div>
            <div class="form_info">
                <label>Cargo:</label>
                <input type="text" name="cargo" value="<?=$cargo?>" required>
            </div>
            <div class="form_info">
                <label class="fechaN">Fecha de Nacimiento:</label>
                <input type="date" name="fechaN" value="<?=$fechaN?>" required>
            </div>
            <input type="submit" value="Modificar" class="btn">
            </table>
        </form>
    </div>
    <div class="btn_volver">
        <a href="personal_index.php" class="btn">Volver</a>
    </div>
</body>
</html>