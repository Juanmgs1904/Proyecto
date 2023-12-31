<?php
$empresa = $_GET['empresa'];
require("../../Model/session/session_almacenExterno.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Almacén</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="indexExterno.php?empresa=' . $empresa . '">'; ?>
                <img src="img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="title">Bienvenido</h1>
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
    <main>
        <div class="opciones">

            <div class="opcion opcionE">
                <?php echo '<a href="lotes/lotesE.php?empresa=' . $empresa . '" class="BTN" data-section="opciones" data-value="btn">'; ?>Ingresar</a>
                <div class="infoOp">
                    <h2 data-section="opciones" data-value="lotes">Lotes</h2>
                    <img src="img/lotes.svg" alt="Imagen lotes">
                </div>

            </div><!--Opción-->
            <div class="opcion opcionE">
                <div class="infoOp">
                    <img src="img/paquetes.svg" alt="Imagen paquetes">
                    <h2 data-section="opciones" data-value="paquetes">Paquetes</h2>
                </div>
                <?php echo '<a href="paquete/paquetesE.php?empresa=' . $empresa . '" class="BTN" data-section="opciones" data-value="btn">'; ?>Ingresar</a>
            </div><!--Opción-->
            <div class="opcion opcionE">
                <?php echo '<a href="almacen/almacenExterno.php?empresa=' . $empresa . '" class="BTN" data-section="opciones" data-value="btn">'; ?>Ingresar</a>
                <div class="infoOp">
                    <h2 data-section="opciones" data-value="almacen">Almacén</h2>
                    <img src="img/almacen.svg" alt="Imagen almacén">
                </div>
            </div><!--Opción-->
        </div><!--Fin listado opciones-->
    </main>
    <script src="script.js"></script>
</body>

</html>