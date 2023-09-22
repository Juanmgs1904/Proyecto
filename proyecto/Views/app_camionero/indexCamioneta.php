<?php

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
                <a href="indexCamioneta.php">
                    <img src="img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Bienvenido</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <a href="../../index.php"><li class="cerrar">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
    <h2 class="title text-center">Opciones</h2>
    <main class="opciones">        
        <a href="tabla_camionetas.php" class="opcion">
            <img src="img/paquetes.svg" alt="Imagen Paquetes">
            <p class="text-center">Ver Paquetes</p>
        </a>
        <a href="entrega.php" class="opcion">
            <img src="img/entrega.svg" alt="Imagen Entrega">
            <p class="text-center">Aviso Entrega</p>
        </a>
        <a href="demoraCamioneta.php" class="opcion">
            <img src="img/demora.svg" alt="Imagen Demora">
            <p class="text-center">Aviso Demora</p>
        </a>
    </main>
</body>

</html>