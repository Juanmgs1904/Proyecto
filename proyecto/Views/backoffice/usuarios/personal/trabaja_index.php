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
                    <h1 data-section="almacenes" data-value="titulo">Almacenes</h1>
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

                    <div class="datos pFila" data-section="personal" data-value="id">ID del Almacén</div>
                    <div class="datos pFila" data-section="paquete" data-value="opciones">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "ocean");
                    $sentencia = "SELECT IDA FROM trabaja";
                    $filas = $conexion->query($sentencia);

                    $idMostradas = array(); // Un array para hacer un seguimiento de las matrículas mostradas

                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        $IDA = $fila['IDA'];

                        // Verifica si la matrícula ya se ha mostrado
                        if (!in_array($IDA, $idMostradas)) {
                            // Si no se ha mostrado, muestra la matrícula y agrega al array
                            $idMostradas[] = $IDA;
                    ?>

                            <div class="datos"><?php echo $fila['IDA'] . " "; ?></div>
                            <?php
                            $IDA = $fila['IDA'];
                            ?>
                            <div class="datos">
                                <?php
                                echo '<a href="personal.php?IDA=' . $fila['IDA'] . '"data-section="personal" data-value="op2">Ver personal</a>';
                                ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="btn_tabla">
            <a class="btn" href="trabaja_agregar.php"  data-section="boton" data-value="volver">Volver</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>