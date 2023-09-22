<?php
require("../../../Model/session/session_administrador2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes</title>
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
                <h1>Gestión de Lote</h1>
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
                <div class="grid5">

                    <div class="datos pFilaH">ID</div>
                    <div class="datos pFilaH">Destino</div>
                    <div class="datos pFilaH">Ruta</div>
                    <div class="datos pFilaH">tiempoEstimado</div>
                    <div class="datos pFilaH">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "proyecto");
                    $sentencia = "SELECT * FROM lotes";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        if ($fila['IDL'] == $_GET['IDL']) {
                            
                    ?>
                        <div class="datos pFilaV">ID</div>
                        <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                        <div class="datos pFilaV">Destino</div>
                        <div class="datos"><?php echo $fila['Destino'] . " "; ?></div>
                        <div class="datos pFilaV">Ruta</div>
                        <div class="datos"><?php echo $fila['Ruta'] . " "; ?></div>
                        <div class="datos pFilaV">tiempoEstimado</div>
                        <div class="datos"><?php echo $fila['tiempoEstimado'] . " "; ?></div>
                        <div class="datos pFilaV">OPCIONES</div>
                        <div class="datosL">
                            <?php
                            echo '<a href="lote_modificar.php?IDL=' . $fila['IDL'] . '&Peso=' . $fila['Peso'] . '&Estado=' . $fila['Estado'] . '&Destino=' . $fila['Destino'] .
                            '&Ruta=' . $fila['Ruta'] .'&tiempoEstimado=' . $fila['tiempoEstimado'].'&idI=' . $fila['idI'] .'">' . '<img src="../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                            ?>
                            <?php
                            echo '<a href="#" onclick="confirmDelete(' . $fila['IDL'] . ');">' . '<img src="../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                            ?>
                            <!-- Resto del código -->

                            <script>
                                function confirmDelete(IDL) {
                                    var confirmation = confirm("¿Estás seguro de que deseas eliminar este Lote?");
                                    if (confirmation) {
                                        // Si el usuario confirma, redirige a la página de eliminación
                                        window.location.href = "../eliminar.php?IDL=" + IDL;
                                    }
                                }
                                // Resto del código JavaScript
                            </script>
                        </div>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>


        </div>
        <div class="btn_tabla">
            <a class="btn" href="lote_index.php">Volver</a>
        </div>

</body>

</html>