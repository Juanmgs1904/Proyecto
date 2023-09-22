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
                <h1>Gestión de Paquetes</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <a href="../../../index.php"><li class="cerrar">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
        <div class="info_tabla">
            <div class="tabla">
                <div class="grid4">

                    <div class="datos pFilaH">codigo</div>
                    <div class="datos pFilaH">Peso</div>
                    <div class="datos pFilaH">Estado</div>
                    <div class="datos pFilaH">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "proyecto");
                    $sentencia = "SELECT * FROM paquetes";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                    ?>
                        <div class="datos pFilaV">Codigo</div>
                        <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                        <div class="datos pFilaV">Peso</div>
                        <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                        <div class="datos pFilaV">Estado</div>
                        <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                        <div class="datos pFilaV">OPCIONES</div>
                        <?php
                        echo '<a href="verRemitoP.php?codigo=' . $fila['codigo'] . '">' . '<div class="datos">Ver Remito</div>' . ' </a>';
                        ?>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="btn_tabla">
            <a class="btn" href="../index.php">Volver</a>
            <a class="btn" href="paquete_agregar.php">Agregar paquete</a>

        </div>
    </div>
</body>

</html>