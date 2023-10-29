<?php
$matricula = $_GET['matricula'];
if (isset($_GET['id'])) {
    $idL = $_GET['id'];
}
$url = "http://localhost/proyecto/controller/transito/C_lotes.php?id=$idL";
require("../../intermediario/getDataAPI.php");
require("../../Model/session/session_camion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista lote</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="formulario">
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <?php echo '<a href="indexCamion.php?matricula=' . $matricula . '">'; ?>
                <img src="img/Logo_sistema.png" alt="Logo de max truck">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="header" data-value="remitoL">Remito del lote</h1>
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
    <div class="grid_tablaLR __contenedor">
        <div class="datosT pFilaH">IDL</div>
        <div class="datosT pFilaH" data-section="lote" data-value="destino">Destino</div>
        <div class="datosT pFilaH" data-section="lote" data-value="tiempoEstimado">tiempoEstimado</div>
        <div class="datosT pFilaH" data-section="lote" data-value="opciones">OPCIONES</div>
        <?php
        foreach ($array as $fila) {
            $IDL = $fila['IDL'];
            if ($IDL == $_GET["id"]) {
        ?>
                <div class="datosT pFilaV" >IDL</div>
                <div class="datosT"><?php echo $fila['IDL'] . " "; ?></div>
                <div class="datosT pFilaV" data-section="lote" data-value="destino">Destino</div>
                <div class="datosT"><?php echo $fila['Destino'] . " "; ?></div>
                <div class="datosT pFilaV" data-section="lote" data-value="tiempoEstimado">tiempoEstimado</div>
                <div class="datosT"><?php echo $fila['tiempoEstimado'] . " "; ?></div>
                <div class="datosT pFilaV" data-section="lote" data-value="opciones">OPCIONES</div>
                <div class="datosT">
                    <?php echo '<form action="../../intermediario/putDataAPI.php?matricula=' . $matricula . '" method="POST">'; ?>
                    <input type="hidden" name="IDLE" value="<?= $IDL ?>">
                    <input type="submit" value="Entregado" data-section="boton" data-value="entregado">
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="lotesC.php?matricula=' . $matricula . '" class="btn" data-section="boton" data-value="volver">'; ?>Volver</a>
    </div>
    <script src="script.js"></script>
</body>

</html>