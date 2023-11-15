<?php

$idA = $_GET['idA'];

$url = "localhost/proyecto/Controller/almacen/C_paquetes.php?idA=$idA";
require("../../../intermediario/getDataAPI.php");

require("../../../Model/session/session_almacen2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paquetes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../index.php?idA=' . $idA . '">' ?>
                <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="title">Bienvenido</h1>
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
            <h2 data-section="paquetesC" data-value="text">PAQUETES DEL ALMACÉN</h2>
        </div>
        <div class="paquetes_grid">
            <div class="datos pFilaH" data-section="paquetesC" data-value="codigo">Codigo</div>
            <div class="datos pFilaH" data-section="paquetesC" data-value="estado">ESTADO</div>
            <div class="datos pFilaH" data-section="paquetesC" data-value="peso">Peso</div>
            <div class="datos pFilaH" data-section="paquetesC" data-value="opciones">OPCIONES</div>
            <?php
            $paquetesMostrados = array(); // Un array para hacer un seguimiento de los paquetes mostrados
            foreach ($array as $fila) {
                if ($fila['Estado'] == 'loteAsignado') {
                    $fila['Estado'] = 'Lote asignado';
                }
                if ($fila['Estado'] == 'enCentral') {
                    $fila['Estado'] = 'En central';
                }
                if ($fila['Estado'] == 'loteDesarmado') {
                    $fila['Estado'] = 'Lote desarmado';
                }
                if ($fila['Estado'] == 'camionetaAsignada') {
                    $fila['Estado'] = 'Camioneta asignada';
                }
                $codigo = $fila['codigo'];
                // Verifica si la matrícula ya se ha mostrado
                if (!in_array($codigo, $paquetesMostrados)) {
                    // Si no se ha mostrado, muestra la matrícula y agrega al array
                    $paquetesMostrados[] = $codigo;
            ?>
                    <div class="datos pFilaV" data-section="paquetesC" data-value="codigo">Codigo</div>
                    <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                    <div class="datos pFilaV" data-section="paquetesC" data-value="estado">Estado</div>
                    <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                    <div class="datos pFilaV" data-section="paquetesC" data-value="peso">Peso</div>
                    <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                    <div class="datos pFilaV" data-section="paquetesC" data-value="opciones">OPCIONES</div>
                    <?php
                    $codigo = $fila['codigo'];
                    ?>
                    <div class="op">
                        <?php
                        echo '<a href="paquete.php?codigo=' . $codigo . '&idA=' . $idA . '">' . '<div class="option" data-section="paquetesC" data-value="remito">Ver Remito</div>' . ' </a>';
                        ?>
                        <?php

                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['codigo'] . '\', \'' . $idA . '\');">' . '<div class="option" data-section="paquetesC" data-value="eliminar">Eliminar</div>'  . ' </a>';
                        ?>
                        <script>
                            const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                            const messages = {
                                es: {
                                    confirmacion_eliminar: "¿Estás seguro de que deseas eliminar este paquete?"
                                },
                                en: {
                                    confirmacion_eliminar: "Are you sure you want to remove this package?"
                                }
                            };

                            const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí

                            function confirmDelete(codigo, idA) {
                                const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto

                                var confirmation = confirm(messages[language].confirmacion_eliminar);
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../../intermediario/deleteDataAPI.php?codigo=" + codigo + "&idA=" + idA;
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
    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="../index.php?idA=' . $idA . '" class="btn" data-section="paquetesC" data-value="btnV">' ?>Volver</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>