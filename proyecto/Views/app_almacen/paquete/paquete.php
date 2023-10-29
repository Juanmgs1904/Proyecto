<?php
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
}
if (isset($_GET['idA'])) {
    $idA = $_GET['idA'];
}
$url = "http://localhost/proyecto/controller/almacen/C_paquetes.php?id=$codigo";
require_once "../../../intermediario/getDataAPI.php";

require("../../../Model/session/session_almacen2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paquete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="fondo">
<header class="header">
        <div class="header__contenedor">
            <div class="header__home">
            <?php echo '<a href="../index.php?idA='.$idA.'">' ?>
                    <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1>Bienvenido</h1>
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
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2>GESTIONAR PAQUETE</h2>
        </div>
        <div class="paquete_grid">
            <div class="datos pFilaH">codigo</div>
            <div class="datos pFilaH">FECHA DE RECIBO</div>
            <div class="datos pFilaH">FECHA DE ENTREGA</div>
            <div class="datos pFilaH">Destinatario</div>
            <div class="datos pFilaH">Destino</div>
            <?php
            foreach ($array as $fila) {
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
            <?php
            }
            ?>
        </div>
    </div>
    <div>
        <div class="btn_volver">
            <?php
            echo '<a href="paquetes.php?idA=' . $idA . '" class="btn">' . "Volver" . ' </a>';
            ?>
        </div>
    </div>
</body>

</html>