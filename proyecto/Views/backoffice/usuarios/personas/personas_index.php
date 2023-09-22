<?php
require("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
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
                    <h1>Gestión de Personas</h1>
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
            <div class="grid5">

                <div class="datos pFilaH">CI</div>
                <div class="datos pFilaH">NOMBRE</div>
                <div class="datos pFilaH">TELÉFONO</div>
                <div class="datos pFilaH">DIRECCIÓN</div>
                <div class="datos pFilaH">OPCIONES</div>

                <?php
                $conexion = new mysqli("localhost", "root", "", "proyecto");
                $sentencia = "SELECT * FROM personas";
                $filas = $conexion->query($sentencia);
                foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                ?>

                    <div class="datos pFilaV">CI</div>
                    <div class="datos"><?php echo $fila['CI'] . " "; ?></div>
                    <div class="datos pFilaV">Nombre</div>
                    <div class="datos"><?php echo $fila['Nombre'] . " "; ?></div>
                    <div class="datos pFilaV">Telefono</div>
                    <div class="datos"><?php echo $fila['Telefono'] . " "; ?></div>
                    <div class="datos pFilaV">Direccion</div>
                    <div class="datos"><?php echo $fila['Direccion'] . " "; ?></div>
                    <div class="datos pFilaV">OPCIONES</div>
                    <div class="datosL">
                        <?php
                        echo '<a href="personas_modificar.php?ci=' . $fila['CI'] .
                            '&nombre=' . $fila['Nombre'] . '&telefono=' . $fila['Telefono'] . '&direccion=' . $fila['Direccion'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                        ?>
                        <?php
                        echo '<a href="#" onclick="confirmDelete(' . $fila['CI'] . ', \'' . $fila['Nombre'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                        ?>
                        <script>
                            function confirmDelete(CI, Nombre) {
                                var confirmation = confirm("¿Estás seguro de que deseas eliminar a " + Nombre + "?");
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../eliminar.php?ci=" + CI;
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
        <a href="../usuarios.php" class="btn">Volver</a>
        <a href="personas_agregar.php" class="btn">Agregar Persona</a>

    </div>
</body>

</html>