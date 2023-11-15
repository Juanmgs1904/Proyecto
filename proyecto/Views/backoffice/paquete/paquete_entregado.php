<?php
require("../../../Model/session/session_administrador2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paquetes</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <a href="../index.php">
                    <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="paquetesE">Paquetes Entregados</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    
                    <div class="flags" id="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../../../img/es.svg" alt="opción español">
                        </div>
                        <div class="flags__item" data-language="en">
                            <img src="../../../img/en.svg" alt="opción inglés">
                        </div>
                    </div>

                    <a href="../../../index.php"><li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
        <div class="info_tabla">
            <div class="tabla">
                <div class="grid4">

                <div class="datos pFilaH" data-section="paquete" data-value="codigo">codigo</div>
                    <div class="datos pFilaH" data-section="paquete" data-value="peso">Peso</div>
                    <div class="datos pFilaH" data-section="paquete" data-value="estado">Estado</div>
                    <div class="datos pFilaH" data-section="paquete" data-value="opciones">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "ocean");
                    $sentencia = "SELECT * FROM vwpaquetesentregados";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                    ?>
                        <div class="datos pFilaV" data-section="paquete" data-value="codigo">Codigo</div>
                        <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                        <div class="datos pFilaV" data-section="paquete" data-value="peso">Peso</div>
                        <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                        <div class="datos pFilaV" data-section="paquete" data-value="estado">Estado</div>
                        <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                        <div class="datos pFilaV" data-section="paquete" data-value="opciones">OPCIONES</div>
                        <?php
                        echo '<a href="verRemitoPE.php?codigo=' . $fila['codigo'] . '">' . '<div class="datosR">'.'<img src="../img/icono_remito.png" alt="Imagen eliminar">'.'</div>' . ' </a>';
                        ?>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="btn_tabla">
            <a class="btn" href="paquete_index.php" data-section="boton" data-value="volver">Volver</a>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>

</html>