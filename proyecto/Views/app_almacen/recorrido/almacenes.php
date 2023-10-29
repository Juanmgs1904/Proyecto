<?php
$mostrar = $_GET['mostrar'];
$idA = $_GET['idA'];
$url = 'http://localhost/proyecto/controller/almacen/C_esta.php';
require("../../../intermediario/getDataAPI.php");
require("../../../Model/session/session_almacenInterno2.php");
if (isset($_GET['IDR'])) {
    $ID = $_GET['IDR'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Almacenes del recorrido</title>
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
            <h2>Almacenes en Recorrido</h2>
        </div>
        <div class="almacenes__grid">
            <div class="datos pFila">ID de los Almacenes</div>
            <div class="datos pFila">Distancia</div>
            <div class="datos pFila">OPCIONES</div>
            <?php

            foreach ($array as $fila) {
                $IDR = $fila['IDR'];
                if ($IDR == $_GET["IDR"]) {
            ?>
                    <div class="datos"><?php echo $fila['IDA'] . " "; ?></div>
                    <div class="datos"><?php echo $fila['Distancia'] . " "; ?></div>
                    <div class="datos">
                        <?php
                        $distancia = $fila['Distancia'];
                        $IDA = $fila['IDA'];
                        echo '<a href="modificar_almacen.php?idA=' . $idA . '&mostrar=' . $mostrar . '&IDR=' . $IDR . '&IDA=' . $IDA . '&distancia=' . $distancia . '">Modificar</a>';
                        if ($mostrar == true) {
                            echo '<a href="#" onclick="confirmDelete(\''  . $fila['IDR'] . '\', \'' . $fila['IDA'] . '\', \'' . $idA . '\', \'' . $mostrar . '\');">' . 'Eliminar</a>';
                        ?>
                            <script>
                                function confirmDelete(IDR, IDA, idA, mostrar) {
                                    var confirmation = confirm("¿Estás seguro de que deseas eliminar este Almacén del Recorrido?");
                                    if (confirmation) {
                                        // Si el usuario confirma, redirige a la página de eliminación
                                        window.location.href = "../../../intermediario/deleteDataAPI.php?IDRA=" + IDR + "&IDA=" + IDA + "&idA=" + idA + "&mostrar=" + mostrar;
                                    }
                                }
                            </script>
                        <?php
                        }
                        ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="recorrido.php?idA=' . $idA . '" class="btn">'; ?>Volver</a>
        </div>
        <div class="btn_tabla">
            <?php
            echo '<a href="agregar_Almacen.php?idA=' . $idA . '&IDR=' . $ID . '&mostrar=' . $mostrar . '" class="btn">Agregar Almacén</a>';
            ?>
        </div>
    </div>
</body>

</html>