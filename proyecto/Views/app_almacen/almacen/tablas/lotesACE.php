<?php
$empresa = $_GET['empresa'];
$matricula = $_GET['matricula'];
$url = 'localhost/proyecto/Controller/almacen/C_asignarLote.php?matricula=' . $matricula . '';
require("../../../../intermediario/getDataAPI.php");
require("../../../../Model/session/session_almacen3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Lotes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../../indexExterno.php?empresa=' . $empresa . '">'; ?>
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
            <h2 data-section="tablaALC" data-value="lotesA">Lotes asignados</h2>
        </div>
        <div class="LEC_grid">
            <div class="datos pFila" data-section="asignarLC" data-value="idL">ID del Lote</div>
            <div class="datos pFila" data-section="recorrido" data-value="opcion">OPCIÓN</div>
            <?php

            foreach ($array as $fila) {
                if ($matricula == $_GET["matricula"]) {
            ?>
                    <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                    <?php
                    $IDL = $fila['IDL'];
                    ?>
                    <div class="datos">
                        <?php
                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['IDL'] . '\', \'' . $matricula . '\', \'' . $empresa . '\');">' . '<div class="option" data-section="lotesAR" data-value="eliminar">Eliminar</div>'  . ' </a>';
                        ?>
                        <script>
                            const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                            const messages = {
                                es: {
                                    confirmacion_eliminar: "¿Estás seguro de que deseas eliminar este Lote del Camión?"
                                },
                                en: {
                                    confirmacion_eliminar: "Are you sure you want to delete this Lot from the Truck ? "
                                }
                            };

                            const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí

                            function confirmDelete(IDL, matricula, empresa) {
                                const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto

                                var confirmation = confirm(messages[language].confirmacion_eliminar);
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../../../intermediario/deleteDataAPI.php?IDLE=" + IDL + "&matriculaE=" + matricula + "&empresa=" + empresa;
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
        <?php echo '<a href="tabla_asignarLACE.php?empresa=' . $empresa . '" class="btn" data-section="lotesC" data-value="btnV">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>