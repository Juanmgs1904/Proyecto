<?php
require("../../../../Model/session/session_administrador2.php");

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
                <h1 data-section="header" data-value="camion">Gestión de Camiones</h1>
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
            <div class="grid7">

                <div class="datos pFilaH pFilaHC" label data-section="camion" data-value="matricula">Matricula</div>
                <div class="datos pFilaH pFilaHC" data-section="camion" data-value="peso">Peso</div>
                <div class="datos pFilaH pFilaHC" data-section="camion" data-value="alto">Alto</div>
                <div class="datos pFilaH pFilaHC" data-section="camion" data-value="ancho">Ancho</div>
                <div class="datos pFilaH pFilaHC" data-section="camion" data-value="largo">Largo</div>
                <div class="datos pFilaH pFilaHC" data-section="camion" data-value="tipo">Tipo</div>
                <div class="datos pFilaH pFilaHC" data-section="paquete" data-value="opciones">OPCIONES</div>

                <?php
                $conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
                $sentencia = "SELECT * FROM camion";
                $filas = $conexion->query($sentencia);
                foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                ?>

                    <div class="datos pFilaV pFilaVC" label data-section="camion" data-value="matricula">Matricula</div>
                    <div class="datos"><?php echo $fila['Matricula'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC" data-section="camion" data-value="peso">Peso</div>
                    <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC" data-section="camion" data-value="alto">Alto</div>
                    <div class="datos"><?php echo $fila['Alto'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC" data-section="camion" data-value="ancho">Ancho</div>
                    <div class="datos"><?php echo $fila['Ancho'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC" data-section="camion" data-value="largo">Largo</div>
                    <div class="datos"><?php echo $fila['Largo'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC" data-section="camion" data-value="tipo">Tipo</div>
                    <div class="datos"><?php echo $fila['Tipo'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC" data-section="paquete" data-value="opciones">OPCIONES</div>
                    <div class="datosL">
                        <?php
                        echo '<a href="camion_modificar.php?Matricula=' . $fila['Matricula'] . '&Peso=' . $fila['Peso'] .
                            '&Alto=' . $fila['Alto'] . '&Ancho=' . $fila['Ancho'] . '&Largo=' . $fila['Largo'] .
                            '&Tipo=' . $fila['Tipo'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                        ?>
                        <?php
                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['Matricula'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                        ?>
                        <!-- Resto del código -->

                        <script>
                            const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                            const messages = {
                                es: {
                                    confirmacion_eliminar: "¿Estás seguro de que deseas eliminar este camión?"
                                },
                                en: {
                                    confirmacion_eliminar: "Are you sure you want to delete this Truck?"
                                }
                            };

const defaultLanguage = 'es'; // Establece el lenguaje por defecto aquí

                            function confirmDelete(Matricula) {
                                        const language = selectedLanguage || defaultLanguage; // Usa el lenguaje seleccionado o el por defecto
                                var confirmation = confirm(messages[language].confirmacion_eliminar);
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../eliminar.php?Matricula=" + Matricula;
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
        <a href="camion_agregar.php" class="btn" data-section="boton" data-value="agregarCamion">Agregar Camión</a>

    </div>
    <script src="script.js"></script>

</body>

</html>