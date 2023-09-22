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
                <h1>Gestión de Paquete</h1>
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
                <div class="grid6">

                    <div class="datos pFilaH">codigo</div>
                    <div class="datos pFilaH">fRecibo</div>
                    <div class="datos pFilaH">fEntrega</div>
                    <div class="datos pFilaH">Destinatario</div>
                    <div class="datos pFilaH">Destino</div>
                    <div class="datos pFilaH">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "proyecto");
                    $sentencia = "SELECT * FROM paquetes";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                        if ($fila['codigo'] == $_GET['codigo']) {
                            
                        
                    ?>
                        <div class="datos pFilaV">Codigo</div>
                        <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                        <div class="datos pFilaV">fRecibo</div>
                        <div class="datos"><?php echo $fila['fRecibo'] . " "; ?></div>
                        <div class="datos pFilaV">fEntrega</div>
                        <div class="datos"><?php echo $fila['fEntrega'] . " "; ?></div>
                        <div class="datos pFilaV">Destinatario</div>
                        <div class="datos"><?php echo $fila['Destinatario'] . " "; ?></div>
                        <div class="datos pFilaV">Destino</div>
                        <div class="datos"><?php echo $fila['Destino'] . " "; ?></div>
                        <div class="datos pFilaV">OPCIONES</div>
                        <div class="datosL">
                            <?php
                            echo '<a href="paquete_modificar.php?codigo=' . $fila['codigo'] . '&Peso=' . $fila['Peso'] . '&Estado=' . $fila['Estado'] . '&fRecibo=' . $fila['fRecibo'] . 
                            '&fEntrega=' . $fila['fEntrega'] . '&Destinatario=' . $fila['Destinatario'] .'&Destino=' . $fila['Destino'] . '">' . '<img src="../img/modificar.svg" alt="Imagen modificar">' . ' </a>';
                            ?>
                            <?php
                            echo '<a href="#" onclick="confirmDelete(\''  . $fila['codigo'] . '\');">' . '<img src="../img/eliminar.svg" alt="Imagen eliminar">' . ' </a>';
                            ?>
                            <!-- Resto del código -->

                            <script>
                                function confirmDelete(codigo) {
                                    var confirmation = confirm("¿Estás seguro de que deseas eliminar este paquete?");
                                    if (confirmation) {
                                        // Si el usuario confirma, redirige a la página de eliminación
                                        window.location.href = "../eliminar.php?codigo=" + codigo;
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
            <a class="btn" href="paquete_index.php">Volver</a>

        </div>
    </div>
</body>

</html>