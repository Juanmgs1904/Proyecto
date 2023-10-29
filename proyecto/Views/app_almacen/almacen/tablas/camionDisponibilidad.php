<?php
$idA = $_GET['idA'];
$ruta = false;
$url = 'http://localhost/proyecto/controller/almacen/C_camiones.php?idA=' . $idA . '&ruta=' . $ruta . '';
require("../../../../intermediario/getDataAPI.php");
require("../../../../Model/session/session_almacen3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Disponibilidad de Camiones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../../index.php?idA=' . $idA . '">'; ?>
                <img src="../../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Max Truck</h1>
            </div>
            <div class="header__logo">
                <input type="checkbox" id="menuD" class="menu-toggle">
                <label for="menuD" class="label"><img src="../../img/personas.png" alt="personas de max truck"></label>

                <ul class="nav__lista">
                    <li><a href="#"><?php echo $_SESSION['mail']; ?></a></li>
                    <a href="../../../../index.php">
                        <li class="cerrar">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tablas__contenedor">
        <div class="tabla__contenedor tabla__flecha">
            <div class="titulo">
                <h2>CAMIONES DISPONIBLES</h2>
            </div>
            <div class="LEC_grid">
                <div class="datosF pFila">MATRÍCULA</div>
                <div class="datosF pFila">OPCIÓN</div>
                <?php
                foreach ($array as $fila) {
                ?>
                    <div class="datosF"><?php echo $fila['Matricula'] . " "; ?></div>
                    <?php
                    $matricula = $fila['Matricula'];
                    ?>
                    <div class="datosF">
                        <?php echo '<a href="../../../../intermediario/putDataAPI.php?matricula=' . $matricula . '&disponibilidad=enRuta&idA=' . $idA . '">'; ?>
                        <img src="../../img/flecha.svg" alt="Imagen flecha derecha" class="flecha">
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
        $ruta = true;
        $url = 'http://localhost/proyecto/controller/almacen/C_camiones.php?idA=' . $idA . '&ruta=' . $ruta . '';
        require("../../../../intermediario/getDataAPI.php");
        ?>
        <div class="tabla__contenedor tabla__flecha">
            <div class="titulo">
                <h2>CAMIONES EN RUTA</h2>
            </div>
            <div class="LEC_grid">
                <div class="datosF pFila">OPCIÓN</div>
                <div class="datosF pFila">MATRÍCULA</div>
                <?php
                foreach ($array as $fila) {
                ?>
                    <?php
                    $matricula = $fila['Matricula'];
                    ?>
                    <div class="datosF">
                        <?php echo '<a href="../../../../intermediario/putDataAPI.php?matricula=' . $matricula . '&disponibilidad=disponible&idA=' . $idA . '">'; ?>
                        <img src="../../img/flecha.svg" alt="Imagen flecha izquierda" class="flechaR">
                        </a>
                    </div>
                    <div class="datosF"><?php echo $fila['Matricula'] . " "; ?></div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="../almacenInterno.php?idA=' . $idA . '" class="btn">'; ?>Volver</a>
    </div>
</body>

</html>