<?php
$mostrar = $_GET['mostrar'];
$idA = $_GET['idA'];
$url = 'localhost/proyecto/Controller/almacen/C_esta.php';
require("../../../intermediario/getDataAPI.php");
require("../../../Model/session/session_almacenInterno2.php");
if (isset($_GET['IDR'])) {
    $ID = $_GET['IDR'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Almacenes del recorrido</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../index.php?idA=' . $idA . '">'; ?>
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
                    <a href="../../../index.php">
                        <li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2 data-section="almacenesR" data-value="text">Almacenes en Recorrido</h2>
        </div>
        <div class="almacenes__grid">
            <div class="datos pFila" data-section="asignarLC" data-value="idA">Almacén</div>
            <div class="datos pFila" data-section="almacenesR" data-value="distancia">Distancia</div>
            <div class="datos pFila" data-section="almacenesR" data-value="opciones">OPCIONES</div>
            <?php

            foreach ($array as $fila) {
                $IDR = $fila['IDR'];
                if ($IDR == $_GET["IDR"]) {
            ?>
                    <div class="datos"><?php echo $fila['ubicacion'] . " "; ?></div>
                    <div class="datos"><?php echo $fila['Distancia'] . " "; ?></div>
                    <div class="datos">
                        <?php
                        $distancia = $fila['Distancia'];
                        $IDA = $fila['IDA'];
                        echo '<a href="modificar_almacen.php?idA=' . $idA . '&mostrar=' . $mostrar . '&IDR=' . $IDR . '&IDA=' . $IDA . '&distancia=' . $distancia . '" data-section="almacenesR" data-value="modificar">Modificar</a>';
                        if ($mostrar == true) {
                            echo '<a href="#" onclick="confirmDelete(\''  . $fila['IDR'] . '\', \'' . $fila['IDA'] . '\', \'' . $idA . '\', \'' . $mostrar . '\');" data-section="almacenesR" data-value="eliminar">' . 'Eliminar</a>';
                        ?>
                            <script>
                                const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                                const messages = {
                                    es: {
                                        confirmacion_eliminar: "¿Estás seguro de que deseas eliminar este Almacén del Recorrido?"
                                    },
                                    en: {
                                        confirmacion_eliminar: "Are you sure you want to remove this Store from the route?"
                                    }
                                };

                                const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí

                                function confirmDelete(IDR, IDA, idA, mostrar) {
                                    const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto

                                    var confirmation = confirm(messages[language].confirmacion_eliminar);
                                    if (confirmation) {
                                        // Si el usuario confirma, redirige a la página de eliminación
                                        window.location.href = "../../../intermediario/deleteDataAPI.php?IDRA=" + IDR + "&IDA=" + IDA + "&idA=" + idA + "&mostrar=" + mostrar;
                                    }
                                }
                            </script>
                        <?php
                        }
                        ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="recorrido.php?idA=' . $idA . '" class="btn" data-section="almacenesR" data-value="btnV">'; ?>Volver</a>
        </div>
        <div class="btn_tabla">
            <?php
            echo '<a href="agregar_almacen.php?idA=' . $idA . '&IDR=' . $ID . '&mostrar=' . $mostrar . '" class="btn" data-section="almacenesR" data-value="btnAA">Agregar Almacén</a>';
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>