<?php
$matricula = $_GET['matricula'];
$url = 'http://localhost/proyecto/controller/transito/C_sigue.php?matricula=' . $matricula . '';
require("../../intermediario/getDataAPI.php");
require("../../Model/session/session_camion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Rutas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="formulario">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <a href="indexCamion.php">
                    <img src="img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Rutas que sigue el camión</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <a href="../../index.php">
                        <li class="cerrar">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="grid_tablaR __contenedor">
        <div class="datosT pFila">Ruta</div>
        <?php
        foreach ($array as $fila) {
            if (isset($fila['nroRuta'])) { ?>
                <div class="datosT"><?php echo $fila['nroRuta'] . " "; ?></div>
            <?php
                $id = $fila['nroRuta'];
            }
        }
        ?>
    </div>
    <div class="grid_tablaR __contenedor">
        <div class="datosT pFila">Almacén</div>
        <?php
        foreach ($array as $fila) {
            if (isset($fila['idI'])) { ?>
                <div class="datosT"><?php echo $fila['idI'] . " "; ?></div>
            <?php
                $id = $fila['idI'];
            }
        }
        ?>
    </div>
    <div class="btn_volver">
        <a href="tabla_camionesRecorrido.php" class="btn">Volver</a>
    </div>
</body>

</html>