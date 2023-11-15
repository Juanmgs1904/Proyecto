<?php
require("../../Model/session/session_almacenInterno.php");
$idA = $_GET['idA'];
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
                <?php echo '<a href="index.php?idA=' . $idA . '">'; ?>
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
            <div class="opcion">
                <div class="infoOp">
                    <img src="img/lotes.svg" alt="Imagen lotes">
                    <h2 data-section="opciones" data-value="lotes">Lotes</h2>
                </div>
                <?php echo '<a href="lotes/lotes.php?idA=' . $idA . '" class="BTN" data-section="opciones" data-value="btn">' ?>Ingresar</a>
            </div><!--Opción-->
            <div class="opcion">
                <?php echo '<a href="paquete/paquetes.php?idA=' . $idA . '" class="BTN" data-section="opciones" data-value="btn">' ?>Ingresar</a>
                <div class="infoOp">
                    <h2 data-section="opciones" data-value="paquetes">Paquetes</h2>
                    <img src="img/paquetes.svg" alt="Imagen paquetes">
                </div>
            </div><!--Opción-->
            
            <?php
            if ($idA == 1) {
                echo '<div class="opcion">';
                echo '<div class="infoOp">';
                echo '<img src="img/logo_ruta.png" alt="Imagen ruta">';
                echo '<h2 data-section="opciones" data-value="recorrido">Recorrido</h2>';
                echo '</div>';
                echo '<a href="recorrido/recorrido.php?idA=' . $idA . '" class="BTN" data-section="opciones" data-value="btn">Ingresar</a>';
                echo '</div><!--Opción-->';
            }
            ?>

            <div class="opcion">
                <?php
                if ($idA == 1) {
                    echo '<a href="almacen/almacenInterno.php?idA=' . $idA . '" class="BTN" data-section="opciones" data-value="btn">Ingresar</a>';
                    echo '<div class="infoOp">';
                    echo '<h2 data-section="opciones" data-value="almacen">Almacén</h2>';
                    echo '<img src="img/almacen.svg" alt="Imagen almacén">';
                    echo '</div>';
                    echo '</div><!--Opción-->';
                }else{
                    
                    echo '<div class="infoOp">';
                    echo '<img src="img/almacen.svg" alt="Imagen almacén">';
                    echo '<h2 data-section="opciones" data-value="almacen">Almacén</h2>';
                    echo '</div>';
                    echo '<a href="almacen/almacenInterno.php?idA=' . $idA . '" class="BTN" data-section="opciones" data-value="btn">Ingresar</a>';
                    echo '</div><!--Opción-->';
                }

                ?>
        </div><!--Fin listado opciones-->
    </main>
    <script src="script.js"></script>
</body>

</html>