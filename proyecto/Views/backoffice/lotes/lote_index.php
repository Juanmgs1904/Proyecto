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
                <h1 data-section="header" data-value="lotes">Gestión de Lotes</h1>
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
                    <a href="../../../index.php"><li class="cerrar" class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
        <div class="info_tabla">

            <div class="tabla">
                <div class="grid5">

                    <div class="datos pFilaH">ID</div>
                    <div class="datos pFilaH" data-section="lote" data-value="peso">Peso</div>
                    <div class="datos pFilaH" data-section="lote" data-value="estado">Estado</div>
                    <div class="datos pFilaH" data-section="lote" data-value="almacenExterno">Almacen Externo</div>
                    <div class="datos pFilaH" data-section="lote" data-value="opciones">OPCIONES</div>

                    <?php
                    $conexion = new mysqli("localhost", "root", "", "ocean");
                    $sentencia = "SELECT * FROM vwLotesNoEntregados";
                    $filas = $conexion->query($sentencia);
                    foreach ($filas->fetch_all(MYSQLI_ASSOC) as $fila) {
                    ?>
                        <div class="datos pFilaV">ID</div>
                        <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                        <div class="datos pFilaV" data-section="lote" data-value="peso">Peso</div>
                        <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                        <div class="datos pFilaV" data-section="lote" data-value="estado">Estado</div>
                        <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                        <div class="datos pFilaV">Almacen Externo</div>
                        <?php if ($fila['enAlmacenExterno'] == 0) {
                           echo '<div class="datos">NO</div>';
                        } else {
                            echo '<div class="datos" data-section="lote" data-value="si">SI</div>';
                        }
                        ?>
                        
                        <div class="datos pFilaV" data-section="lote" data-value="opciones">OPCIONES</div>
                        <?php
                        echo '<a href="verRemitoL.php?IDL=' . $fila['IDL'] . '">' . '<div class="datosR">'.'<img src="../img/icono_remito.png" alt="Imagen eliminar">'.'</div>' . ' </a>';
                        ?>
                    <?php
                    }
                    ?>
                </div>
            </div>


        </div>
        <div class="btn_tabla">
            <a class="btn" href="../index.php" data-section="boton" data-value="volver">Volver</a>
            <a class="btn" href="lote_agregar.php" data-section="boton" data-value="agregarlote">Agregar Lote</a>
        </div>

        <div class="btn_tabla">
            <a class="btn" href="lote_entregado.php" data-section="boton" data-value="lotesEntregado">Lotes Entregados</a>
        </div>

        <script src="script.js"></script>
</body>

</html>