<?php
require("../../../Model/session/session_almacenExterno2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <a href="../index.php">
                    <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Bienvenido</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <a href="../../../index.php">
                        <li class="cerrar">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <main class="opciones__contenedor">
        <div class="opciones__grid">
            <a href="asignarPaqueteAL.php" class="opcion opcion1">
                <div class="imagenes">
                    <img src="../img/paquetes.svg" alt="imagen paquete">
                    <img src="../img/flecha.svg" alt="imagen flecha">
                    <img src="../img/lotes.svg" alt="imagen lote">
                </div>
                <div class="texto">
                    <h3>Asignar Paquetes a Lotes</h3>
                </div>
            </a>
            
            <a href="asignarLote.php" class="opcion opcion2">
                <div class="imagenes">
                    <img src="../img/lotes.svg" alt="imagen lotes">
                    <img src="../img/flecha.svg" alt="imagen flecha">
                    <img src="../img/camion.svg" alt="imagen camión">
                </div>
                <div class="texto">
                    <h3>Asignar Lotes a Camiones</h3>
                </div>
            </a>

            <a href="llegadaAE.php" class="opcion opcion3">
                <div class="imagenes">
                    <img src="../img/almacen.svg" alt="imagen almacén">
                    <img src="../img/flecha.svg" alt="imagen flecha" class="rota-horizontal">
                    <img src="../img/camion.svg" alt="imagen camión" class="rota-horizontal">
                </div>
                <div class="texto">
                    <h3>Marcar Hora de LLegada</h3>
                </div>
            </a>
            <a href="salidaAE.php" class="opcion opcion4">
                <div class="imagenes">
                    <img src="../img/almacen.svg" alt="imagen almacén">
                    <img src="../img/flecha.svg" alt="imagen flecha">
                    <img src="../img/camion.svg" alt="imagen camión">
                </div>
                <div class="texto">
                    <h3>Marcar Hora de Salida</h3>
                </div>
            </a>
        </div>
        <div class="almacen_volver">
            <a href="../index.php" class="btn">Volver</a>
        </div>
    </main>
</body>

</html>