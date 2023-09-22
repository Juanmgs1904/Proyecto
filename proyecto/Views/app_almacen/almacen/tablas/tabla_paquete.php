<?php
session_start();

$varsesion = $_SESSION['mail'];


$app = $_SESSION['rol'];

if ($varsesion==null || $varsesion=='' ) {
    header("Location: ../../login/login.php");
    die();
}

if ($app == "AlmacenInterno") {
    header("Location: ../../index.php");
    die();
}

if ($app != "AlmacenExterno") {
    header("Location: ../../../login/login.php"); 
    die();
}

//
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Llegadas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__titulo">
                <h1>Max truck</h1>
            </div>
            <div class="header__logo">
                <img src="../../img/Logo_sistema.png" alt="Logo de max truck">
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2>LLEGADAS DE CAMIONES</h2>
        </div>
        <div class="grid">
            <div class="datos pFila">MATRÍCULA</div>
            <div class="datos pFila">ID ALMACÉN</div>
            <div class="datos pFila">FECHA</div>
            <div class="datos pFila">OPCIONES</div>
            <?php
            foreach ($array as $fila) {
            ?>
                <div class="datos"><?php echo $fila['Matricula'] . " "; ?></div>
                <div class="datos"><?php echo $fila['IDA'] . " "; ?></div>
                <div class="datos"><?php echo $fila['FechaLlegada'] . " "; ?></div>
                <?php
                $matricula = $fila['Matricula'];
                ?>
                <div class="datos">
                    <?php
                    echo '<a href="../../../../intermediario/deleteDataAPI.php?matricula=' . $matricula . '">' . "Eliminar" . ' </a>';
                    echo '<a href="modificar_llegada.php?matricula=' . $fila['Matricula'] . '&idA=' . $fila['IDA'] . '&fechaLlegada=' . $fila['FechaLlegada'] . '">Modificar</a>';
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="btn_volver">
        <a href="../llegadaAE.php" class="btn">Volver</a>
    </div>
</body>

</html>