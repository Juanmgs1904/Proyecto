<?php
require("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
                <h1 data-section="personas" data-value="usuarios">Gestión de Usuarios</h1>
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
            <div class="gridU">

                <div class="datos pFilaHU" data-section="usuario" data-value="mail">MAIL</div>
                <div class="datos pFilaHU" data-section="usuario" data-value="contraseña">CONTRASEÑA</div>
                <div class="datos pFilaHU" data-section="usuario" data-value="estado">ESTADO</div>
                <div class="datos pFilaHU" data-section="usuario" data-value="rol">ROL</div>
                <div class="datos pFilaHU" data-section="paquete" data-value="opciones">OPCIONES</div>

                <?php
                $conexion = new mysqli("localhost", "root", "", "ocean");
                $sentencia = "SELECT * FROM usuario";
                $filas = $conexion->query($sentencia);
                foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                ?>

                    <div class="datos pFilaVU" data-section="usuario" data-value="mail">Mail</div>
                    <div class="datos"><?php echo $fila['Mail'] . " "; ?></div>
                    <div class="datos pFilaVU" data-section="usuario" data-value="contraseña">Contraseña</div>
                    <div class="datos chico"><?php echo $fila['Contraseña'] . " "; ?></div>
                    <div class="datos pFilaVU" data-section="usuario" data-value="estado">Estado</div>
                    <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                    <div class="datos pFilaVU" data-section="usuario" data-value="rol">Rol</div>
                    <div class="datos" ><?php echo $fila['Rol'] . " "; ?></div>
                    <div class="datos pFilaVU" data-section="paquete" data-value="opciones">OPCIONES</div>
                    <div class="datos">
                        <?php
                        echo '<a href="usuario_modificar.php?Mail=' . $fila['Mail'] . '&Contraseña=' . $fila['Contraseña'] .
                            '&Estado=' . $fila['Estado'] . '&Rol=' . $fila['Rol'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                        ?>
                        <?php
                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['Mail'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                        ?>
                        <script>
                            const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                            const messages = {
                                es: {
                                    confirmacion_eliminar: "¿Estás seguro de que deseas eliminar este Usuario?"
                                },
                                en: {
                                    confirmacion_eliminar: "Are you sure you want to delete this User?"
                                }
                            };

                            const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí
                            
                            function confirmDelete(Mail) {
                                        const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto
                                var confirmation = confirm(messages[language].confirmacion_eliminar);
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../eliminar.php?Mail=" + Mail;
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
        <a href="../usuarios.php" class="btn" data-section="boton" data-value="volver">Volver</a>
        <a href="usuario_agregar.php" class="btn" data-section="boton" data-value="agregarUsuario">Agregar Usuario</a>

    </div>
    <script src="script.js"></script>
</body>

</html>