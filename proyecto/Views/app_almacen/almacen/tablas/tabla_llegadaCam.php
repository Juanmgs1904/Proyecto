<?php
$idA = $_GET['idA'];
$url = 'localhost/proyecto/Controller/almacen/C_llegadaCam.php?idA=' . $idA . '';
require("../../../../intermediario/getDataAPI.php");
require("../../../../Model/session/session_almacenInterno3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Llegadas</title>
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
            <h2 data-section="tablaLCam" data-value="text">LLEGADAS DE CAMIONETAS</h2>
        </div>
        <div class="gridCam">
            <div class="datos pFilaH" data-section="asignarLAC" data-value="matricula">MATRÍCULA</div>
            <div class="datos pFilaH" data-section="tablaLCam" data-value="fecha">FECHA</div>
            <div class="datos pFilaH" data-section="almacenesR" data-value="opciones">OPCIONES</div>
            <?php
            foreach ($array as $fila) {
            ?><div class="datos pFilaV" data-section="asignarLAC" data-value="matricula">MATRÍCULA</div>
                <div class="datos"><?php echo $fila['MatriculaC'] . " "; ?></div>
                <div class="datos pFilaV" data-section="tablaLCam" data-value="fecha">FECHA</div>
                <div class="datos"><?php echo $fila['FechaLlegada'] . " "; ?></div>
                <div class="datos pFilaV" data-section="almacenesR" data-value="opciones">OPCIONES</div>
                <?php
                $matriculaC = $fila['MatriculaC'];
                ?>
                <div class="datos">
                    <?php
                    echo '<a href="#" onclick="confirmDelete(\''  . $fila['MatriculaC'] . '\', \'' . $idA . '\', \'' . $fila["FechaLlegada"] . '\');">' . '<div class="option" data-section="lotesC" data-value="eliminar">Eliminar</div>' . ' </a>';
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

                        function confirmDelete(matriculaC, IDA, FechaLlegada) {
                            const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto

                            var confirmation = confirm(messages[language].confirmacion_eliminar);
                            if (confirmation) {
                                // Si el usuario confirma, redirige a la página de eliminación
                                window.location.href = "../../../../intermediario/deleteDataAPI.php?matriculaC=" + matriculaC + "&fechaLlegada=" + FechaLlegada + "&idA=" + IDA;
                            }
                        }
                    </script>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="../llegadaCam.php?idA=' . $idA . '" class="btn" data-section="lotesC" data-value="btnV">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>