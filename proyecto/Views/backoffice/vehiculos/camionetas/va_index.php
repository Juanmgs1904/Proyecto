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
                    <h1 data-section="almacenes" data-value="titulo">Almacen</h1>
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

                    <div class="datos pFila" data-section="almacenes" data-value="titulo">Almacén</div>
                    <div class="datos pFila" data-section="paquete" data-value="opciones">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "ocean");
                    $sentencia = "SELECT idI FROM va";
                    $filas = $conexion->query($sentencia);
                    
                    $idMostradas = array(); // Un array para hacer un seguimiento de las matrículas mostradas

                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        $idI = $fila['idI'];

                        // Verifica si la matrícula ya se ha mostrado
                        if (!in_array($idI, $idMostradas)) {
                            // Si no se ha mostrado, muestra la matrícula y agrega al array
                            $idMostradas[] = $idI;
                    ?>

                            <div class="datos"><?php echo $fila['idI'] . " "; ?></div>
                            <?php
                            $matriculaC = $fila['idI'];
                            ?>
                            <div class="datos">
                                <?php
                                echo '<a href="camionetaVa.php?idI=' . $fila['idI'] . '"data-section="camionero" data-value="op">Ver Camioneta</a>';
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
            <a class="btn" href="va_agregar.php" data-section="boton" data-value="volver">Volver</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>