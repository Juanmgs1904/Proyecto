<?php
$matriculaC = $_GET['matricula'];
$url = 'localhost/Controller/transito/C_transporta.php?matricula='.$matriculaC.'';
require("../../intermediario/getDataAPI.php");
require("../../Model/session/session_camioneta.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Paquetes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="formulario">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="indexCamioneta.php?matricula='.$matriculaC.'">'; ?>
                    <img src="img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="paquetesC">Paquetes de la Camioneta</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <div class="flags" id="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../../img/es.svg" alt="opción español">
                        </div>
                        <div class="flags__item" data-language="en">
                            <img src="../../img/en.svg" alt="opción inglés">
                        </div>
                    </div>

                    <a href="../../index.php">
                        <li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="grid_tabla __contenedor">
        <div class="datosT pFila" data-section="paquete" data-value="codigo">CÓDIGO</div>
        <div class="datosT pFila" data-section="paquete" data-value="opciones">OPCIÓN</div>
        <?php
        foreach ($array as $fila) {
            $matricula = $fila['MatriculaC'];
            if ($matricula == $matriculaC) {
        ?>
                <div class="datosT"><?php echo $fila['codigo'] . " "; ?></div>
                <?php
                $id = $fila['codigo'];
                ?>
                <div class="datosT">
                    <?php
                    echo '<a href="remitoP.php?id=' . $id . '&matricula='.$matriculaC.'" data-section="boton" data-value="ver">' . "Ver Remito" . ' </a>';
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="indexCamioneta.php?matricula='.$matriculaC.'" class="btn" data-section="boton" data-value="volver">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>