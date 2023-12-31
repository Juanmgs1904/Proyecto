<?php
require("../../Model/session/session_administrador.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BackOffice</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <a href="index.php">
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
    <main class="opciones">
        <div class="opciones_titulo">
            <h2 class="text-center" data-section="seleccionar" data-value="title">Seleccionar</h2>
            <hr>
        </div>
        <div class="opciones__grid">
            <a href="usuarios/usuarios.php" class="opcion" data-section="seleccionar" data-value="op1">
                Personas
            </a><!--Opción-->
            <a href="paquete/paquete_index.php" class="opcion" data-section="seleccionar" data-value="op2">
                Paquetes
            </a><!--Opción-->
            <a href="vehiculos/vehiculos.php" class="opcion" data-section="seleccionar" data-value="op3">
                Vehículos
            </a><!--Opción-->
            <a href="lotes/lote_index.php" class="opcion" data-section="seleccionar" data-value="op4">
                Lotes
            </a><!--Opción-->
            <a href="almacenes/almacen.php" class="opcion" data-section="seleccionar" data-value="op5">
                Almacenes
            </a><!--Opción-->
        </div><!--Fin Listado Opciones-->
    </main>

    <script src="script.js"></script>
                    
</body>

</html>