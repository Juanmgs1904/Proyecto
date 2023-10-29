<?php

$idA = $_GET['idA'];

$url = "http://localhost/proyecto/controller/almacen/C_paquetes.php?idA=$idA";
require("../../../intermediario/getDataAPI.php");

require("../../../Model/session/session_almacen2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paquetes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
            <?php echo '<a href="../index.php?idA='.$idA.'">' ?>             
                    <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Bienvenido</h1>
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
            <h2>PAQUETES DEL ALMACÉN</h2>
        </div>
        <div class="paquetes_grid">
            <div class="datos pFilaH">Codigo</div>
            <div class="datos pFilaH">ESTADO</div>
            <div class="datos pFilaH">Peso</div>
            <div class="datos pFilaH">OPCIONES</div>
            <?php
            foreach ($array as $fila) {
            ?>
                <div class="datos pFilaV">Codigo</div>
                <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                <div class="datos pFilaV">Estado</div>
                <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                <div class="datos pFilaV">ID del Remito</div>
                <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                <div class="datos pFilaV">OPCIONES</div>
                <?php
                $codigo = $fila['codigo'];
                ?>
                <div class="op">
                    <?php
                    echo '<a href="paquete.php?codigo=' . $codigo . '&idA=' . $idA . '">' . '<div class="option">Ver Remito</div>' . ' </a>';
                    ?>
                    <?php
                    
                    echo '<a href="#" onclick="confirmDelete(\''  . $fila['codigo'] . '\', \'' . $idA . '\');">' . '<div class="option">Eliminar</div>'  . ' </a>';
                    ?>
                    <script>
                        function confirmDelete(codigo,idA) {
                            var confirmation = confirm("¿Estás seguro de que deseas eliminar este paquete?");
                            if (confirmation) {
                                // Si el usuario confirma, redirige a la página de eliminación
                                window.location.href = "../../../intermediario/deleteDataAPI.php?codigo=" + codigo +"&idA=" + idA;
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
            <?php echo '<a href="../index.php?idA='.$idA.'" class="btn">' ?>Volver</a>
        </div>
        <?php
        if ($app == "AlmacenExterno") {
        ?>
            <div class="btn_tabla">
                <?php
                echo '<a href="agregar_paquete.php?idA=' . $idA . '" class="btn">' . "Agregar Paquete" . ' </a>';
                ?>
            </div>
        <?php
        }
        ?>

    </div>
</body>

</html>