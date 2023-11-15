<?php
require("../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div>
        <header class="header">
            <div class="header__contenedor">
                <div class="header__home">
                    <a href="../index.php">
                        <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                    </a>
                </div>
                <div class="header__titulo">
                    <h1 data-section="header" data-value="lotes">Gestión de Lote</h1>
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
                            <li class="cerrar" class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li>
                        </a>
                    </ul>
                </div>
            </div>
        </header>
        <div class="info_tabla">

            <div class="tabla">
                <div class="grid4">

                    <div class="datos pFilaH">ID</div>
                    <div class="datos pFilaH" data-section="lote" data-value="destino">Destino</div>
                    <div class="datos pFilaH" data-section="lote" data-value="tiempoEstimado">tiempoEstimado</div>
                    <div class="datos pFilaH" data-section="lote" data-value="opciones">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
                    $sentencia = "SELECT * FROM lotes";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        if ($fila['IDL'] == $_GET['IDL']) {

                    ?>
                            <div class="datos pFilaV">ID</div>
                            <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                            <div class="datos pFilaV" data-section="lote" data-value="destino">Destino</div>
                            <div class="datos"><?php echo $fila['Destino'] . " "; ?></div>
                            <div class="datos pFilaV" data-section="lote" data-value="tiempoEstimado">tiempoEstimado</div>
                            <div class="datos"><?php echo $fila['tiempoEstimado'] . " "; ?></div>
                            <div class="datos pFilaV" data-section="lote" data-value="opciones">OPCIONES</div>
                            <div class="datosL">
                                <?php
                                echo '<a href="lote_modificar.php?IDL=' . $fila['IDL'] . '&Peso=' . $fila['Peso'] . '&Estado=' . $fila['Estado'] . '&Destino=' . $fila['Destino'] .
                                    '&tiempoEstimado=' . $fila['tiempoEstimado'] . '">'
                                    . '<img src="../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                                ?>
                                <?php
                                echo '<a href="#" onclick="confirmDelete(\''  . $fila['IDL'] . '\');">' . '<img src="../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                                ?>

                                <script>
                                    const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                                    const messages = {
                                        es: {
                                            confirmacion_eliminar: "¿Estás seguro de que deseas eliminar este lote?"
                                        },
                                        en: {
                                            confirmacion_eliminar: "Are you sure you want to delete this lot?"
                                        }
                                    };

                                    const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí

                                    function confirmDelete(IDL) {
                                        const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto

                                        var confirmation = confirm(messages[language].confirmacion_eliminar);
                                        if (confirmation) {
                                            // Si el usuario confirma, redirige a la página de eliminación
                                            window.location.href = "../eliminar.php?IDL=" + IDL;
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


        </div>
        <div class="btn_tabla">
            <a class="btn" href="lote_index.php" data-section="boton" data-value="volver">Volver</a>
        </div>

        <script src="script.js"></script>
</body>

</html>