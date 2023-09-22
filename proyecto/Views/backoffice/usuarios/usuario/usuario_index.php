<?php
require("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
                <h1>Gestión de Usuarios</h1>
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
            <div class="gridU">

                <div class="datos pFilaHU">MAIL</div>
                <div class="datos pFilaHU">CONTRASEÑA</div>
                <div class="datos pFilaHU">ESTADO</div>
                <div class="datos pFilaHU">ROL</div>
                <div class="datos pFilaHU">OPCIONES</div>

                <?php
                $conexion = new mysqli("localhost", "root", "", "proyecto");
                $sentencia = "SELECT * FROM usuario";
                $filas = $conexion->query($sentencia);
                foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                ?>

                    <div class="datos pFilaVU">Mail</div>
                    <div class="datos"><?php echo $fila['Mail'] . " "; ?></div>
                    <div class="datos pFilaVU">Contraseña</div>
                    <div class="datos"><?php echo $fila['Contraseña'] . " "; ?></div>
                    <div class="datos pFilaVU">Estado</div>
                    <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                    <div class="datos pFilaVU">Rol</div>
                    <div class="datos"><?php echo $fila['Rol'] . " "; ?></div>
                    <div class="datos pFilaVU">OPCIONES</div>
                    <div class="datos">
                        <?php
                        echo '<a href="usuario_modificar.php?Mail=' . $fila['Mail'] . '&Contraseña=' . $fila['Contraseña'] .
                            '&Estado=' . $fila['Estado'] . '&Rol=' . $fila['Rol'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                        ?>
                        <?php
                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['Mail'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                        ?>
                        <script>
                            function confirmDelete(Mail) {
                                var confirmation = confirm("¿Estás seguro de que deseas eliminar a " + Mail + "?");
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../eliminar.php?Mail=" + Mail;
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
        <a href="usuario_agregar.php" class="btn">Agregar Persona</a>

    </div>
</body>

</html>