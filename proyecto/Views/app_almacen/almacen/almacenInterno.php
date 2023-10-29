<?php
$idA = $_GET['idA'];
require("../../../Model/session/session_almacenInterno2.php");
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
                <?php echo '<a href="../index.php?idA=' . $idA . '">'; ?>
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

            <?php
            if ($idA != 1) {
                echo '<a href="asignarPaqueteAC.php?idA=' . $idA . '" class="opcion opcion1">';
                echo '<div class="imagenes">';
                echo '<img src="../img/paquetes.svg" alt="imagen paquete">';
                echo '<img src="../img/flecha.svg" alt="imagen flecha">';
                echo '<img src="../img/camioneta.svg" alt="imagen camioneta">';
                echo '</div>';
                echo '<div class="texto">';
                echo '<h3>Asignar Paquetes a Camionetas</h3>';
                echo '</div>';
                echo '</a>';
            }

            if ($idA == 1) {
                echo '<a href="asignarPaqueteAL.php?idA=' . $idA . '" class="opcion opcion1">';
                echo '<div class="imagenes">';
                echo '<img src="../img/paquetes.svg" alt="imagen paquete">';
                echo '<img src="../img/flecha.svg" alt="imagen flecha">';
                echo '<img src="../img/lotes.svg" alt="imagen lote">';
                echo '</div>';
                echo '<div class="texto">';
                echo '<h3>Asignar Paquetes a Lotes</h3>';
                echo '</div>';
                echo '</a>';
            }

            if ($idA == 1) {
                echo '<a href="asignarLote.php?idA=' . $idA . '" class="opcion opcion2">';
                echo '<div class="imagenes">';
                echo '<img src="../img/lotes.svg" alt="imagen lotes">';
                echo '<img src="../img/flecha.svg" alt="imagen flecha">';
                echo '<img src="../img/camion.svg" alt="imagen camión">';
                echo '</div>';
                echo '<div class="texto">';
                echo '<h3>Asignar Lotes a Camiones</h3>';
                echo '</div>';
                echo '</a>';
            }
            ?>

            <?php
            if ($idA != 1) {
                echo '<a href="llegadaCam.php?idA=' . $idA . '" class="opcion opcion4">';
                echo '<div class="imagenes">';
                echo '<img src="../img/almacen.svg" alt="imagen almacén">';
                echo '<img src="../img/flecha.svg" alt="imagen flecha" class="rota-horizontal">';
                echo '<img src="../img/camioneta.svg" alt="imagen camión" class="rota-horizontal">';
                echo '</div>';
                echo '<div class="texto">';
                echo '<h3>Marcar Hora de llegada de Camionetas</h3>';
                echo '</div>';
                echo '</a>';
            }

            if ($idA != 1) {
                echo '<a href="salidaCam.php?idA=' . $idA . '" class="opcion opcion4">';
                echo '<div class="imagenes">';
                echo '<img src="../img/almacen.svg" alt="imagen almacén">';
                echo '<img src="../img/flecha.svg" alt="imagen flecha">';
                echo '<img src="../img/camioneta.svg" alt="imagen camión">';
                echo '</div>';
                echo '<div class="texto">';
                echo '<h3>Marcar Hora de Salida de Camionetas</h3>';
                echo '</div>';
                echo '</a>';
            }
            if ($idA == 1) {
                echo '<a href="tablas/camionDisponibilidad.php?idA=' . $idA . '" class="opcion opcion4">';
                echo '<div class="imagen">';
                echo '<img src="../img/camion.svg" alt="imagen almacén">';
                echo '</div>';
                echo '<div class="texto">';
                echo '<h3>Disponibilidad de los Camiones</h3>';
                echo '</div>';
                echo '</a>';
            }
            ?>
        </div>
        <div class="almacen_volver">
            <?php echo '<a href="../index.php?idA=' . $idA . '" class="btn">'; ?>Volver</a>
        </div>
    </main>
</body>

</html>