<?php
require("../../../../Model/session/session_administrador3.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camioneros</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <div>
        <header class="header">
            <div class="header__contenedor">
                <div class="header__home">
                    <a href="../../index.php">
                        <img src="../../img/Logo_sistema.png" alt="Logo de max truck">
                    </a>
                </div>
                <div class="header__titulo">
                    <h1 data-section="camionero" data-value="titulo">Camioneros de un Camion</h1>
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
        <div class="info_tabla">
            <div class="tabla">
                <div class="grid2">

                    <div class="datos pFila">CI</div>
                    <div class="datos pFila" data-section="paquete" data-value="opciones">OPCIONES</div>
                    <?php

                    $conexion = new mysqli("localhost", "root", "", "ocean");
                    $sentencia = "SELECT * FROM conduce";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        $matricula = $fila['MatriculaV'];
                        if ($matricula == $_GET["matriculaV"]) {
                    ?>
                            <div class="datos"><?php echo $fila['CIC'] . " "; ?></div>
                            <?php
                            $CIC = $fila['CIC'];
                            ?>
                            <div class="datos">
                                <?php
                                echo '<a href="#" onclick="confirmDelete(\''  . $fila['CIC'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                                ?>
                                <script>
                                    const messages = {
                                        es: {
                                            confirmacion_eliminar: "¿Estás seguro de que deseas eliminar al camionero de este camión?"
                                        },
                                        en: {
                                            confirmacion_eliminar: "Are you sure you want to eliminate the trucker from this truck?"
                                        }
                                    };
//no funca
                                    function confirmDelete(CIC) {
                                        var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
                                        if (confirmation) {
                                            // Si el usuario confirma, redirige a la página de eliminación
                                            window.location.href = "../../eliminar.php?CIC=" + CIC;
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
            <a class="btn" href="conduce_index.php" data-section="boton" data-value="volver">Volver</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>