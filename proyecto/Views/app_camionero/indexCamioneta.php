<?php
$matricula = $_GET['matricula'];
require("../../Model/session/session_camioneta.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Camioneros</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="indexCamioneta.php?matricula='.$matricula.'">'; ?>
                    <img src="img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="bienvenido">Bienvenido</h1>
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
    <h2 class="title text-center" data-section="seleccionar" data-value="title">Opciones</h2>
    <main class="opciones">
        <?php echo '<a href="paquetesC.php?matricula='.$matricula.'" class="opcion">'; ?>        
            <img src="img/paquetes.svg" alt="Imagen Paquetes">
            <p class="text-center" data-section="seleccionar" data-value="op4">Ver Paquetes</p>
        </a>
        <?php echo '<a href="entrega.php?matricula='.$matricula.'" class="opcion">'; ?>
            <img src="img/entrega.svg" alt="Imagen Entrega">
            <p class="text-center" data-section="seleccionar" data-value="op5">Aviso Entrega</p>
        </a>
        <?php echo '<a href="demoraCamioneta.php?matricula='.$matricula.'" class="opcion">'; ?>
            <img src="img/demora.svg" alt="Imagen Demora">
            <p class="text-center" data-section="seleccionar" data-value="op3">Aviso Demora</p>
        </a>
    </main>
    <script src="script.js"></script>
</body>

</html>