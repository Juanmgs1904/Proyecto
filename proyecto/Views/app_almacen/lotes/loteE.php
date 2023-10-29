<?php
$empresa = $_GET['empresa'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$url = "http://localhost/proyecto/controller/almacen/C_lotes.php?id=$id";
require_once "../../../intermediario/getDataAPI.php";

require("../../../Model/session/session_almacen2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lote</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="fondo">
<header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="../indexExterno.php?empresa='.$empresa.'">'; ?>
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
            <h2>GESTIONAR LOTE</h2>
        </div>
        <div class="loteE_grid">
            <div class="datos pFilaH">IDL</div>
            <div class="datos pFilaH">Destino</div>
            <div class="datos pFilaH">tiempoEstimado</div>
            <?php
            foreach ($array as $fila) {
            ?> <div class="datos pFilaV">ID</div>
                <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                <div class="datos pFilaV">Destino</div>
                <div class="datos"><?php echo $fila['Destino'] . " "; ?></div>
                <div class="datos pFilaV">Tiempo Estimado</div>
                <div class="datos"><?php echo $fila['tiempoEstimado'] . " "; ?></div>
            <?php
            }
            ?>
        </div>
    </div>
    <div>
        <div class="btn_volver">
            <?php
            echo '<a href="lotesE.php?empresa='.$empresa.'" class="btn">Volver</a>';
            ?>
        </div>
    </div>
</body>

</html>