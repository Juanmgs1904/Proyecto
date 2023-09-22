<?php
require("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacenes</title>
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
                    <h1>Gestión de Almacenes</h1>
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
                <div class="grid4">

                    <div class="datos pFilaH">ID</div>
                    <div class="datos pFilaH">Ubicación</div>
                    <div class="datos pFilaH">ruta</div>
                    <div class="datos pFilaH">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "proyecto");
                    $sentencia = "SELECT * FROM almacen";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                    ?>

                        <div class="datos pFilaV">ID</div>
                        <div class="datos"><?php echo $fila['id'] . " "; ?></div>
                        <div class="datos pFilaV">ubicacion</div>
                        <div class="datos"><?php echo $fila['ubicacion'] . " "; ?></div>
                        <div class="datos pFilaV">ruta</div>
                        <div class="datos"><?php echo $fila['ruta'] . " "; ?></div>
                        <div class="datos pFilaV">OPCIONES</div>
                        <div class="datosL">
                            <?php
                            echo '<a href="almacen_modificar.php?id=' . $fila['id'] . '&ubicacion=' . $fila['ubicacion'] . '&ruta=' . $fila['ruta'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                            ?>
                            <?php
                            echo '<a href="#" onclick="confirmDelete(' . $fila['id'] . ');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                            ?>
                            <!-- Resto del código -->

                            <script>
                                function confirmDelete(id) {
                                    var confirmation = confirm("¿Estás seguro de que deseas eliminar este Almacen?");
                                    if (confirmation) {
                                        // Si el usuario confirma, redirige a la página de eliminación
                                        window.location.href = "../../eliminar.php?id=" + id;
                                    }
                                }
                                // Resto del código JavaScript
                            </script>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="btn_tabla">
            <a class="btn" href="../almacen.php">Volver</a>
            <a class="btn" href="almacen_agregar.php">Agregar almacen</a>

        </div>
    </div>
</body>

</html>