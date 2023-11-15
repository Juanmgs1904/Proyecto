<?php
$matricula = $_GET['matricula'];
$url = 'localhost/Controller/transito/C_vaHacia.php?matricula=' . $matricula . '';
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
                <?php echo '<a href="indexCamion.php?matricula=' . $matricula . '">'; ?>
                <img src="img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="recorrido">Recorrido</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <div class="flags" id="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../../img/es.svg" alt="opción español">
                        </div>
                        <div class="flags__item" data-language="en">
                            <img src="../../img/en.svg" alt="opción inglés">
                        </div>
                    </div>

                    <a href="../../index.php">
                        <li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2 data-section="recorrido" data-value="titulo">Almacenes de Destino</h2>
        </div>
        <div class="recorrido_grid">
            <div class="datos pFilaH">IDL</div>
            <div class="datos pFilaH" data-section="recorrido" data-value="almacen">ALMACENES</div>
            <div class="datos pFilaH" data-section="recorrido" data-value="ubicacion">UBICACIÓN</div>
            <div class="datos pFilaH" data-section="recorrido" data-value="direccion">DIRECCIÓN</div>
            <div class="datos pFilaH" data-section="recorrido" data-value="distancia">DISTANCIA</div>
            <?php
            $almacenesMostrados = array(); // Un array para hacer un seguimiento de los almacenes mostrados
            foreach ($array as $fila) {
                $almacen = $fila['IDA'];
                // Verifica si la matrícula ya se ha mostrado
                if (!in_array($almacen, $almacenesMostrados)) {
                    // Si no se ha mostrado, muestra la matrícula y agrega al array
                    $almacenesMostrados[] = $almacen;
            ?>
                    <div class="datos pFilaV">IDL</div>
                    <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                    <div class="datos pFilaV" data-section="recorrido" data-value="almacen">Almacenes</div>
                    <div class="datos"><?php echo $fila['IDA'] . " "; ?></div>
                    <div class="datos pFilaV" data-section="recorrido" data-value="ubicacion">Ubicación</div>
                    <div class="datos"><?php echo $fila['Ubicacion'] . " "; ?></div>
                    <div class="datos pFilaV" data-section="recorrido" data-value="direccion">Dirección</div>
                    <div class="datos"><?php echo $fila['Direccion'] . " "; ?></div>
                    <div class="datos pFilaV linea" data-section="recorrido" data-value="distancia">Distancia</div>
                    <div class="datos linea"><?php echo $fila['Distancia'] . " "; ?></div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="indexCamion.php?matricula=' . $matricula . '" class="btn" data-section="boton" data-value="volver">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>