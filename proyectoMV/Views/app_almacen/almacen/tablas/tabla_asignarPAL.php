<?php
$idA = $_GET['idA'];
$url = 'localhost/Controller/almacen/C_asignarPAL.php?idA='.$idA.'';
require("../../../../intermediario/getDataAPI.php");
require("../../../../Model/session/session_almacen3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Lotes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body class="fondo">
<header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../../index.php?idA='.$idA.'">'; ?>
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
                    <div class="flags" id="flags">
                        <div class="flags__item" data-language="es">
                            <img src="../../../../img/es.svg" alt="opción español">
                        </div>
                        <div class="flags__item" data-language="en">
                            <img src="../../../../img/en.svg" alt="opción inglés">
                        </div>
                    </div>
                    <a href="../../../../index.php"><li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2 data-section="opciones" data-value="lotes">Lotes</h2>
        </div>
        <div class="LEC_grid">
            <div class="datos pFila" data-section="tablaAPL" data-value="lotes">LOTES</div>
            <div class="datos pFila" data-section="recorrido" data-value="opcion">OPCIÓN</div>
            <?php
            $lotesMostradas = array(); // Un array para hacer un seguimiento de las matrículas mostradas
            foreach ($array as $fila) {
                $IDL = $fila['IDL'];

                // Verifica si la matrícula ya se ha mostrado
                if (!in_array($IDL, $lotesMostradas)) {
                    // Si no se ha mostrado, muestra la matrícula y agrega al array
                    $lotesMostradas[] = $IDL;
            ?>

                    <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                    <?php
                    $IDL = $fila['IDL'];
                    ?>
                    <div class="datos">
                        <?php
                        echo '<a href="paquetesAL.php?IDL=' . $fila['IDL'] . '&idA='.$idA.'" data-section="tablaAPL" data-value="btnP">Ver Paquetes</a>';
                        ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="../asignarPaqueteAL.php?idA='.$idA.'" class="btn" data-section="recorrido" data-value="btnV">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>