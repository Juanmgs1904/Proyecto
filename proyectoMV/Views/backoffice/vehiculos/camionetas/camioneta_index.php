<?php
require("../../../../Model/session/session_administrador3.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camiones</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <a href="../../index.php">
                    <img src="../../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="camioneta">Gestión de Camionetas</h1>
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

                <div class="datos pFila" data-section="camioneta" data-value="matricula">Matricula</div>
                <div class="datos pFila" data-section="paquete" data-value="opciones">OPCIONES</div>

                <?php
                $conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
                $sentencia = "SELECT * FROM camioneta";
                $filas = $conexion->query($sentencia);
                foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                ?>
                    <div class="datos"><?php echo $fila['MatriculaC'] . " "; ?></div>
                    <div class="datosL">

                        <?php
                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['MatriculaC'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                        ?>
                        <!-- Resto del código -->

                        <script>
                            const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                            const messages = {
                                es: {
                                    confirmacion_eliminar: "¿Estás seguro de que deseas eliminar esta camioneta?"
                                },
                                en: {
                                    confirmacion_eliminar: "Are you sure you want to delete this van?"
                                }
                            };

                            const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí

                            function confirmDelete(MatriculaC) {
                                const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto
                                var confirmation = confirm(messages[language].confirmacion_eliminar);
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../eliminar.php?MatriculaC=" + MatriculaC;
                                }
                            }
                        </script>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="btn_tabla">
        <a href="../vehiculos.php" class="btn" data-section="boton" data-value="volver">Volver</a>
        <a href="camioneta_agregar.php" class="btn" data-section="boton" data-value="agregarCamioneta">Agregar Camioneta</a>

    </div>
    
    <div class="btn_tabla">
            <a class="btn" href="va_agregar.php" data-section="boton" data-value="asignarVa">Asignar Almacén</a>
        </div>
    <script src="script.js"></script>
</body>

</html>