<?php
require("../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios de Autenticación</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
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
                <h1>Max Truck</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    
                    <div class="flags" id="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../../../img/es.svg" alt="opción español">
                        </div>
                        <div class="flags__item" data-language="en">
                            <img src="../../../img/en.svg" alt="opción inglés">
                        </div>
                    </div>

                    <a href="../../../index.php"><li class="cerrar" li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
    <div>
        <div class="usuarios__contenedor">
            <h1 data-section="vehiculos" data-value="titulo">Vehículos</h1>
            <div class="info">
                <a href="vehiculo/vehiculo_index.php" class="btn" data-section="vehiculos" data-value="vehiculo">Gestionar Vehiculos</a>
                <a href="camiones/camion_index.php" class="btn" data-section="vehiculos" data-value="camion">Gestionar Camiones</a>
                <a href="camionetas/camioneta_index.php" class="btn" data-section="vehiculos" data-value="camioneta">Gestionar Camionetas</a>
            </div>
        </div>
    </div>

    <div class="btn_tabla">
        <a class="btn" href="../index.php" data-section="boton" data-value="volver">Volver</a>
    </div>
    
    <script src="script.js"></script>
</body>

</html>