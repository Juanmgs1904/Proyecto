<?php
require("../../../../Model/session/session_administrador2.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículo</title>
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
                <h1>Gestión de Vehiculos</h1>
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

                <div class="datos pFilaH">Matricula</div>
                <div class="datos pFilaH">Estado</div>
                <div class="datos pFilaH">Disponibilidad</div>
                <div class="datos pFilaH">OPCIONES</div>

                <?php
                $conexion = new mysqli("localhost", "root", "", "proyecto");
                $sentencia = "SELECT * FROM vehiculo";
                $filas = $conexion->query($sentencia);
                foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                ?>

                    <div class="datos pFilaV">Matricula</div>
                    <div class="datos"><?php echo $fila['MatriculaV'] . " "; ?></div>
                    <div class="datos pFilaV">Estado</div>
                    <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                    <div class="datos pFilaV">Disponibilidad</div>
                    <div class="datos"><?php echo $fila['Disponibilidad'] . " "; ?></div>
                    <div class="datos pFilaV">OPCIONES</div>
                    <div class="datosL">
                        <?php
                        echo '<a href="vehiculo_modificar.php?MatriculaV=' . $fila['MatriculaV'] . '&Estado=' . $fila['Estado'] . '&Disponibilidad=' . $fila['Disponibilidad'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                        ?>
                        <?php
                        echo '<a href="#" onclick="confirmDelete(' . $fila['MatriculaV'] . ');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                        ?>
                        <!-- Resto del código -->

                        <script>
                            function confirmDelete(MatriculaV) {
                                var confirmation = confirm("¿Estás seguro de que deseas eliminar este camión?");
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../eliminar.php?MatriculaV=" + MatriculaV;
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
        <a href="../vehiculos.php" class="btn">Volver</a>
        <a href="vehiculo_agregar.php" class="btn">Agregar Camión</a>

    </div>
</body>

</html>