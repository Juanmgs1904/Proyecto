<?php
require("../../../../Model/session/session_administrador3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
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
                    <h1>Gestión de Personal</h1>
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

                    <div class="datos pFilaH">CI</div>
                    <div class="datos pFilaH">CARGO</div>
                    <div class="datos pFilaH">FECHA DE NACIMIENTO</div>
                    <div class="datos pFilaH">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "proyecto");
                    $sentencia = "SELECT * FROM personal";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                    ?>

                        <div class="datos pFilaV">CI</div>
                        <div class="datos"><?php echo $fila['CIP'] . " "; ?></div>
                        <div class="datos pFilaV">Cargo</div>
                        <div class="datos"><?php echo $fila['Cargo'] . " "; ?></div>
                        <div class="datos pFilaV">Fecha de Nacimiento</div>
                        <div class="datos"><?php echo $fila['FechaNacimiento'] . " "; ?></div>
                        <div class="datos pFilaV">OPCIONES</div>
                        <div class="datosL">
                            <?php
                            echo '<a href="personal_modificar.php?ciP=' . $fila['CIP'] . '&cargo=' . $fila['Cargo'] . '&fechaN=' . $fila['FechaNacimiento'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                            ?>
                            <?php
                            echo '<a href="#" onclick="confirmDelete(' . $fila['CIP'] . ');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                            ?>
                            <script>
                                function confirmDelete(CIP) {
                                    var confirmation = confirm("¿Estás seguro de que deseas eliminar a este trabajador?");
                                    if (confirmation) {
                                        // Si el usuario confirma, redirige a la página de eliminación
                                        window.location.href = "../../eliminar.php?ciP=" + CIP;
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
            <a class="btn" href="../usuarios.php">Volver</a>
            <a class="btn" href="personal_agregar.php">Agregar Personal</a>

        </div>
        <div class="btn_tabla">
            <a class="btn" href="trabaja_agregar.php">Asignar Almacén</a>
        </div>
    </div>
</body>

</html>