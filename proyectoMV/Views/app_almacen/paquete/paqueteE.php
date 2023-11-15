<?php
$empresa = $_GET['empresa'];
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
}
$url = "localhost/Controller/almacen/C_paquetesE.php?id=$codigo";
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
                <?php echo '<a href="../indexExterno.php?empresa='.$empresa.'">'; ?>
                    <img src="../img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="title">Bienvenido</h1>
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
                    <a href="../../../index.php"><li class="cerrar" data-section="header" data-value="logout">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2 data-section="paqueteC" data-value="text">GESTIONAR PAQUETE</h2>
        </div>
        <div class="paqueteE_grid">
            <div class="datos pFilaH" data-section="paqueteC" data-value="codigo">codigo</div>
            <div class="datos pFilaH" data-section="paqueteC" data-value="fechaR">FECHA DE RECIBO</div>
            <div class="datos pFilaH" data-section="paqueteC" data-value="fechaE">FECHA DE ENTREGA</div>
            <div class="datos pFilaH" data-section="paqueteC" data-value="destinatario">Destinatario</div>
            <div class="datos pFilaH" data-section="paqueteC" data-value="destino">Destino</div>
            <div class="datos pFilaH" data-section="paqueteC" data-value="departamento">Departamento</div>
            <div class="datos pFilaH" data-section="paquetesC" data-value="opciones">OPCIONES</div>
            <?php
            foreach ($array as $fila) {
            ?>
                <div class="datos pFilaV" data-section="paqueteC" data-value="codigo">Codigo</div>
                <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                <div class="datos pFilaV" data-section="paqueteC" data-value="fechaR">fRecibo</div>
                <div class="datos"><?php echo $fila['fRecibo'] . " "; ?></div>
                <div class="datos pFilaV" data-section="paqueteC" data-value="fechaE">fEntrega</div>
                <div class="datos"><?php echo $fila['fEntrega'] . " "; ?></div>
                <div class="datos pFilaV" data-section="paqueteC" data-value="destinatario">Destinatario</div>
                <div class="datos"><?php echo $fila['Destinatario'] . " "; ?></div>
                <div class="datos pFilaV" data-section="paqueteC" data-value="destino">Destino</div>
                <div class="datos"><?php echo $fila['Destino'] . " "; ?></div>
                <div class="datos pFilaV" data-section="paqueteC" data-value="departamento">Departamento</div>
                <div class="datos"><?php echo $fila['Departamento'] . " "; ?></div>
                <div class="datos pFilaV" data-section="paquetesC" data-value="opciones">OPCIONES</div>
                <div class="op">
                    <?php
                    echo '<a href="modificar_paqueteE.php?codigo=' . $fila['codigo'] . '&peso=' . $fila['Peso'] .
                        '&estado=' . $fila['Estado'] . '&fRecibo=' . $fila['fRecibo'] . '&fEntrega=' . $fila['fEntrega'] .
                        '&Destinatario=' . $fila['Destinatario'] . '&Destino='.  $fila['Destino'] . '&Departamento='.  $fila['Departamento'] .'&empresa='.$empresa.'">' . '<div class="option" data-section="loteC" data-value="modificar">Modificar</div>' . '</a>';
                    ?>
                </div>
            
            <?php
            }
            ?>
        </div>
    </div>
    <div>
        <div class="btn_volver">
            <?php
            echo '<a href="paquetesE.php?empresa='.$empresa.'" class="btn" data-section="paqueteC" data-value="btnV">' . "Volver" . ' </a>';
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>