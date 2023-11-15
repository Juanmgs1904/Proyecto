<?php
$idA = $_GET['idA'];
$url = 'localhost/proyecto/Controller/almacen/C_asignarPAC.php';
require("../../../../intermediario/getDataAPI.php");
require("../../../../Model/session/session_almacenInterno3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Paquetes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../../index.php?idA=' . $idA . '">'; ?>
                <img src="../../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Max Truck</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <div class="flags" id="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../../../../img/es.svg" alt="opción español">
                        </div>
                        <div class="flags__item" data-language="en">
                            <img src="../../../../img/en.svg" alt="opción inglés">
                        </div>
                    </div>
                    <a href="../../../../index.php">
                        <li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2 data-section="paquetesAL" data-value="text">Paquetes asignados</h2>
        </div>
        <div class="LEC_grid">
            <div class="datos pFila" data-section="paquetesC" data-value="codigo">CÓDIGO</div>
            <div class="datos pFila" data-section="recorrido" data-value="opcion">OPCIÓN</div>
            <?php

            foreach ($array as $fila) {
                $matriculaC = $fila['MatriculaC'];
                if ($matriculaC == $_GET["matriculaC"]) {
            ?>
                    <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                    <?php
                    $codigo = $fila['codigo'];
                    ?>
                    <div class="datos">

                        <?php
                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['codigo'] . '\', \'' . $idA . '\', \'' . $matriculaC . '\');">' . '<div class="option" data-section="recorrido" data-value="eliminar">Eliminar</div>'  . ' </a>';
                        ?>
                        <script>
                            const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                            const messages = {
                                es: {
                                    confirmacion_eliminar: "¿Estás seguro de que deseas eliminar este paquete de la camioneta?"
                                },
                                en: {
                                    confirmacion_eliminar: "Are you sure you want to remove this package from the van?"
                                }
                            };

                            const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí

                            function confirmDelete(codigo, idA, matricula) {
                                const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto

                                var confirmation = confirm(messages[language].confirmacion_eliminar);
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../../../intermediario/deleteDataAPI.php?codigoC=" + codigo + "&idA=" + idA + "&matricula=" + matricula;
                                }
                            }
                        </script>
                    </div>
            <?php
                }
            }

            ?>
        </div>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="tabla_asignarPAC.php?idA=' . $idA . '" class="btn" data-section="lotesC" data-value="btnV">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>