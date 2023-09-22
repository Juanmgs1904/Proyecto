<?php
$url = 'http://localhost/proyecto/controller/almacen/C_asignarPAC.php';
require("../../../../intermediario/getDataAPI.php");
require("../../../../Model/session/session_almacenInterno3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Camionetas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body class="fondo">
<header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <a href="../../index.php">
                    <img src="../../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Max Truck</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <a href="../../../../index.php"><li class="cerrar">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2>Camionetas</h2>
        </div>
        <div class="PAC_grid">
            <div class="datos pFila">MATRÍCULA</div>
            <div class="datos pFila">OPCIÓN</div>
            <?php
            $matriculasMostradas = array(); // Un array para hacer un seguimiento de las matrículas mostradas

            foreach ($array as $fila) {
                $matriculaC = $fila['MatriculaC'];

                // Verifica si la matrícula ya se ha mostrado
                if (!in_array($matriculaC, $matriculasMostradas)) {
                    // Si no se ha mostrado, muestra la matrícula y agrega al array
                    $matriculasMostradas[] = $matriculaC;
            ?>

                    <div class="datos"><?php echo $fila['MatriculaC'] . " "; ?></div>
                    <?php
                    $matriculaC = $fila['MatriculaC'];
                    ?>
                    <div class="datos">
                        <?php
                        echo '<a href="paquetesAC.php?matriculaC=' . $fila['MatriculaC'] . '">Ver Paquetes</a>';
                        ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="btn_volver">
        <a href="../asignarPaqueteAC.php" class="btn">Volver</a><!--llevarlo a llegadaAE -->
    </div>
</body>

</html>