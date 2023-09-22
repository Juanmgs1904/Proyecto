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
                    <h1>Personal de un Almacén</h1>
                </div>
                <div class="header__logo">
                        <input type="checkbox" id="menuD" class="menu-toggle">
                        <label for="menuD" class="label"><img src="../../img/personas.png" alt="personas de max truck"></label>

                        <ul class="nav__lista">
                            <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                            <a href="../../../../index.php"><li class="cerrar">Cerrar Sesión</li></a>
                        </ul>
                </div>
            </div>
        </header>
        <div class="info_tabla">
            <div class="tabla">
                <div class="grid2">

                    <div class="datos pFila">CI</div>
                    <div class="datos pFila">OPCIONES</div>
                    <?php

                    $conexion = new mysqli("localhost", "root", "", "proyecto");
                    $sentencia = "SELECT * FROM trabaja";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        $IDA = $fila['IDA'];
                        if ($IDA == $_GET["IDA"]) {
                    ?>
                            <div class="datos"><?php echo $fila['CIP'] . " "; ?></div>
                            <?php
                            $CIP = $fila['CIP'];
                            ?>
                            <div class="datos">
                                <?php
                                echo '<a href="#" onclick="confirmDelete(\''  . $fila['CIP'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                                ?>
                                <script>
                                    function confirmDelete(CIP) {
                                        var confirmation = confirm("¿Estás seguro de que deseas eliminar al camionero de este camión?");
                                        if (confirmation) {
                                            // Si el usuario confirma, redirige a la página de eliminación
                                            window.location.href = "../../eliminar.php?CIP=" + CIP;
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
            <a class="btn" href="trabaja_index.php">Volver</a>
        </div>
    </div>
</body>

</html>