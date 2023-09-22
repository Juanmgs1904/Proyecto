<?php
require("../../../../Model/session/session_administrador2.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camiones</title>
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
                <h1>Gestión de Camiones</h1>
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
            <div class="grid7">

                <div class="datos pFilaH pFilaHC">Matricula</div>
                <div class="datos pFilaH pFilaHC">Peso</div>
                <div class="datos pFilaH pFilaHC">Alto</div>
                <div class="datos pFilaH pFilaHC">Ancho</div>
                <div class="datos pFilaH pFilaHC">Largo</div>
                <div class="datos pFilaH pFilaHC">Tipo</div>
                <div class="datos pFilaH pFilaHC">OPCIONES</div>

                <?php
                $conexion = new mysqli("localhost", "root", "", "proyecto");
                $sentencia = "SELECT * FROM camion";
                $filas = $conexion->query($sentencia);
                foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                ?>

                    <div class="datos pFilaV pFilaVC">Matricula</div>
                    <div class="datos"><?php echo $fila['Matricula'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC">Peso</div>
                    <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC">Alto</div>
                    <div class="datos"><?php echo $fila['Alto'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC">Ancho</div>
                    <div class="datos"><?php echo $fila['Ancho'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC">Largo</div>
                    <div class="datos"><?php echo $fila['Largo'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC">Tipo</div>
                    <div class="datos"><?php echo $fila['Tipo'] . " "; ?></div>
                    <div class="datos pFilaV pFilaVC">OPCIONES</div>
                    <div class="datosL">
                        <?php
                        echo '<a href="camion_modificar.php?Matricula=' . $fila['Matricula'] . '&Peso=' . $fila['Peso'] .
                            '&Alto=' . $fila['Alto'] . '&Ancho=' . $fila['Ancho'] . '&Largo=' . $fila['Largo'] .
                            '&Tipo=' . $fila['Tipo'] . '">' . '<img src="../../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                        ?>
                        <?php
                        echo '<a href="#" onclick="confirmDelete(\''  . $fila['Matricula'] . '\');">' . '<img src="../../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                        ?>
                        <!-- Resto del código -->

                        <script>
                            function confirmDelete(Matricula) {
                                var confirmation = confirm("¿Estás seguro de que deseas eliminar este camión?");
                                if (confirmation) {
                                    // Si el usuario confirma, redirige a la página de eliminación
                                    window.location.href = "../../eliminar.php?Matricula=" + Matricula;
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
        <a href="camion_agregar.php" class="btn">Agregar Camión</a>

    </div>
</body>

</html>