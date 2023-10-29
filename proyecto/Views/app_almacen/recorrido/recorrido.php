<?php
$idA = $_GET['idA'];
$url = 'http://localhost/proyecto/controller/almacen/C_recorrido.php';
require("../../../intermediario/getDataAPI.php");
require("../../../Model/session/session_almacenInterno2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Recorrido</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../index.php?idA=' . $idA . '">'; ?>
                <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Max Truck</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <a href="../../../index.php">
                        <li class="cerrar">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2>Recorrido</h2>
        </div>
        <div class="recorrido_grid">
            <div class="datos pFila">ID de la Recorrido</div>
            <div class="datos pFila">OPCIÓN</div>
            <?php
            foreach ($array as $fila) {
            ?>
                <div class="datos"><?php echo $fila['IDR'] . " "; ?></div>
                <?php
                $IDR = $fila['IDR'];
                ?>
                <div class="datos">
                    <?php
                    $mostrar = 0;
                    $url = 'http://localhost/proyecto/controller/almacen/C_recorrido.php?mostrar=$mostrar';
                    require("../../../intermediario/getDataAPI.php");
                    foreach ($array as $filas) {
                        if ($fila['IDR'] == $filas['IDR']) {
                            $mostrar = true;
                            echo '<a href="#" onclick="confirmDelete(\''  . $fila['IDR'] . '\', \'' . $idA . '\');">' . 'Eliminar</a>';
                        }
                    }
                    echo '<a href="almacenes.php?IDR=' . $fila['IDR'] . '&idA=' . $idA . '&mostrar=' . $mostrar . '">Ver Almacenes</a>';
                    ?>
                    <script>
                        function confirmDelete(IDR, idA) {
                            var confirmation = confirm("¿Estás seguro de que deseas eliminar este recorrido?");
                            if (confirmation) {
                                // Si el usuario confirma, redirige a la página de eliminación
                                window.location.href = "../../../intermediario/deleteDataAPI.php?IDR=" + IDR + "&idA=" + idA;
                            }
                        }
                    </script>
                </div>

            <?php

            }
            ?>
        </div>
    </div>

    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="../index.php?idA=' . $idA . '"class="btn"">'; ?>Volver</a>
        </div>
        <div class="btn_volver">
        <?php echo '<a href="../../../intermediario/agregar_recorrido.php?idA='.$idA.'" class="btn">'; ?>Agregar Recorrido</a>
        </div>
    </div>
</body>

</html>