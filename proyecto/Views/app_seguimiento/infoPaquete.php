<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['selectedLanguage'] = $_GET['lang'];
}

$codigo = $_POST['codigo'];
$url = "http://localhost/proyecto/controller/transito/C_paquetes.php?codigo=$codigo";
require("../../intermediario/getDataAPI.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Paquete</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <a href="index.php" class="home">
                <img src="img/flecha.svg" alt="Icono flecha">
            </a>
            <div class="title">
                <h1 class="text-center" data-section="seguimiento" data-value="titleT">Información del Paquete</h1>
            </div>
            <img src="img/Logo_sistema.png" alt="imagen logo">
        </div>
    </header>
    <?php
    if (!empty($array)) {
    ?>
        <div class="tabla__contenedor">
            <div class="titulo">
                <h2 data-section="seguimiento" data-value="titleP">DATOS DE TU PAQUETE</h2>
            </div>
            <div class="paquetes_grid">
                <div class="datos pFilaH" data-section="seguimiento" data-value="codigoP">Codigo</div>
                <div class="datos pFilaH" data-section="seguimiento" data-value="pesoP">Peso</div>
                <div class="datos pFilaH" data-section="seguimiento" data-value="fechaRP">Fecha de Recibo</div>
                <div class="datos pFilaH" data-section="seguimiento" data-value="fechaEP">Fecha de Entrega</div>
                <div class="datos pFilaH" data-section="seguimiento" data-value="destinatarioP">Destinatario</div>
                <div class="datos pFilaH" data-section="seguimiento" data-value="destinoP">Destino</div>
                <?php
                foreach ($array as $fila) {
                ?>
                    <div class="datos pFilaV">Codigo</div>
                    <div class="datos"><?php echo $fila['codigo'] . " "; ?></div>
                    <div class="datos pFilaV">Peso</div>
                    <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                    <div class="datos pFilaV">Fecha de Recibo</div>
                    <div class="datos"><?php echo $fila['fRecibo'] . " "; ?></div>
                    <div class="datos pFilaV">Fecha de Entrega</div>
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
        <?php
        foreach ($array as $fila) {
            switch ($fila['Estado']) {
                case "enAlmacenExterno":
        ?>
                    <img src="img/entrega_1.png" alt="Barra de entrega" class="barra">
                <?php
                    break;
                case "loteExternoAsignado":
                ?>
                    <img src="img/entrega_2.png" alt="Barra de entrega" class="barra">
                <?php
                    break;
                case "enCentral":
                ?>
                    <img src="img/entrega_3.png" alt="Barra de entrega" class="barra">
                <?php
                    break;
                case "loteAsignado":
                ?>
                    <img src="img/entrega_4.png" alt="Barra de entrega" class="barra">
                <?php
                    break;
                case "loteDesarmado":
                ?>
                    <img src="img/entrega_5.png" alt="Barra de entrega" class="barra">
                <?php
                    break;
                case "camionetaAsignada":
                ?>
                    <img src="img/entrega_6.png" alt="Barra de entrega" class="barra">
                <?php
                    break;
                case "entregado":
                ?>
                    <img src="img/entrega_7.png" alt="Barra de entrega" class="barra">
        <?php
                    break;
            }
        }
        ?>
        <?php
        $url = "http://localhost/proyecto/controller/transito/C_lotesP.php?codigo=$codigo";
        require("../../intermediario/getDataAPI.php");
        if (!empty($array)) {
        ?>
            <div class="tabla__contenedor">
                <div class="titulo">
                    <h2 data-section="seguimiento" data-value="titleL">LOTE DE PAQUETE</h2>
                </div>
                <div class="lotes_grid">
                    <div class="datos pFilaH" data-section="seguimiento" data-value="IDLL">IDL</div>
                    <div class="datos pFilaH" data-section="seguimiento" data-value="destinoL">Destino</div>
                    <div class="datos pFilaH" data-section="seguimiento" data-value="tiempoL">Tiempo Estimado</div>
                    <?php
                    foreach ($array as $fila) {
                    ?>
                        <div class="datos pFilaV">IDL</div>
                        <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                        <div class="datos pFilaV">Destino</div>
                        <div class="datos"><?php echo $fila['Destino'] . " "; ?></div>
                        <div class="datos pFilaV">Tiempo Estimado</div>
                        <div class="datos"><?php echo $fila['tiempoEstimado'] . " "; ?></div>


                    <?php
                        $IDL = $fila['IDL'];
                    }
                    ?>
                </div>
            </div>
            <?php
            $url = "http://localhost/proyecto/controller/transito/C_camionP.php?IDL=$IDL";
            require("../../intermediario/getDataAPI.php");
            if (!empty($array)) {
            ?>
                <div class="tabla__contenedor">
                    <div class="titulo">
                        <h2 data-section="seguimiento" data-value="titleC">CAMIÓN DEL PAQUETE</h2>
                    </div>
                    <div class="camiones_grid">
                        <div class="datos pFilaH" data-section="seguimiento" data-value="matriculaC">Matrícula</div>
                        <div class="datos pFilaH" data-section="seguimiento" data-value="fechaEC">Fecha de Entrega</div>
                        <?php
                        foreach ($array as $fila) {
                        ?>
                            <div class="datos pFilaV">Matrícula</div>
                            <div class="datos"><?php echo $fila['Matricula'] . " "; ?></div>
                            <div class="datos pFilaV">Fecha de Entrega</div>
                            <div class="datos"><?php echo $fila['fEntrega'] . " "; ?></div>
                        <?php
                            $matricula = $fila['Matricula'];
                        }
                        ?>
                    </div>
                </div>
                <?php
                $url = "http://localhost/proyecto/controller/transito/C_choferP.php?Matricula=$matricula";
                require("../../intermediario/getDataAPI.php");
                if (!empty($array)) {
                ?>
                    <div class="tabla__contenedor">
                        <div class="titulo">
                            <h2 data-section="seguimiento" data-value="titleCH">CHOFERES DE LOS CAMIONES</h2>
                        </div>
                        <div class="choferes_grid">
                            <div class="datos pFilaH" data-section="seguimiento" data-value="matriculaC">Matrícula</div>
                            <div class="datos pFilaH" data-section="seguimiento" data-value="nombre">Nombre</div>
                            <div class="datos pFilaH" data-section="seguimiento" data-value="demora">Demora</div>
                            <div class="datos pFilaH" data-section="seguimiento" data-value="fechaD">Fecha de Demora</div>
                            <?php
                            foreach ($array as $fila) {
                            ?>
                                <div class="datos pFilaV">Matrícula</div>
                                <div class="datos"><?php echo $fila['MatriculaV'] . " "; ?></div>
                                <div class="datos pFilaV">Nombre</div>
                                <div class="datos"><?php echo $fila['Nombre'] . " "; ?></div>
                                <div class="datos pFilaV">Demora</div>
                                <div class="datos"><?php echo $fila['Demora'] . " "; ?></div>
                                <div class="datos pFilaV">Fecha de Demora</div>
                                <div class="datos"><?php echo $fila['fDemora'] . " "; ?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    $url = "http://localhost/proyecto/controller/transito/C_camionetasP.php?codigo=$codigo";
                    require("../../intermediario/getDataAPI.php");
                    if (!empty($array)) {
                    ?>
                        <div class="tabla__contenedor">
                            <div class="titulo">
                                <h2 data-section="seguimiento" data-value="titleCam">CAMIONETA DEL PAQUETE</h2>
                            </div>
                            <div class="camiones_grid">
                                <div class="datos pFilaH" data-section="seguimiento" data-value="matriculaC">Matrícula</div>
                                <div class="datos pFilaH" data-section="seguimiento" data-value="fechaE">Fecha de Entrega</div>
                                <?php
                                foreach ($array as $fila) {
                                ?>
                                    <div class="datos pFilaV">Matrícula</div>
                                    <div class="datos"><?php echo $fila['MatriculaC'] . " "; ?></div>
                                    <div class="datos pFilaV">Fecha de Entrega</div>
                                    <div class="datos"><?php echo $fila['fEntrega'] . " "; ?></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        $matricula = $fila['MatriculaC'];
                        $url = "http://localhost/proyecto/controller/transito/C_choferP.php?Matricula=$matricula";
                        require("../../intermediario/getDataAPI.php");
                        if (!empty($array)) {
                        ?>
                            <div class="tabla__contenedor">
                                <div class="titulo">
                                    <h2 data-section="seguimiento" data-value="titleCHCam">CHOFÉR DE LA CAMIONETA</h2>
                                </div>
                                <div class="choferes_grid">
                                    <div class="datos pFilaH" data-section="seguimiento" data-value="matriculaC">Matrícula</div>
                                    <div class="datos pFilaH" data-section="seguimiento" data-value="nombre">Nombre</div>
                                    <div class="datos pFilaH" data-section="seguimiento" data-value="demora">Demora</div>
                                    <div class="datos pFilaH" data-section="seguimiento" data-value="fechaD">Fecha de Demora</div>
                                    <?php
                                    foreach ($array as $fila) {
                                    ?>
                                        <div class="datos pFilaV">Matrícula</div>
                                        <div class="datos"><?php echo $fila['MatriculaV'] . " "; ?></div>
                                        <div class="datos pFilaV">Nombre</div>
                                        <div class="datos"><?php echo $fila['Nombre'] . " "; ?></div>
                                        <div class="datos pFilaV">Demora</div>
                                        <div class="datos"><?php echo $fila['Demora'] . " "; ?></div>
                                        <div class="datos pFilaV">Fecha de Demora</div>
                                        <div class="datos"><?php echo $fila['fDemora'] . " "; ?></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            ?>
        <?php
                        }
                    }
                }
            }
        }
        ?>
    <?php
    } else {
    ?>
        <div class="respuesta_error">
            <img src="img/error.png" alt="icono error">
            <h3 class="text-center error" data-section="seguimiento" data-value="error">No hay ningún Paquete con ese código</h3>
        </div>
    <?php
    }
    ?>
    <footer class="footer">
        <div class="contact">
            <div class="info">
                <div class="logo_info">
                    <img src="img/Logo_sistema.png" alt="logo" class="logo-system">
                    <h2 class="h-info">Max Truck</h2>
                </div>
                <h3>&#9400Quick Carry</h3>
            </div>
            <div class="flags" id="flags">
                <div class="flags__item" data-language="es" onclick="changeLanguage('es')">
                    <img src="../../img/es.svg" alt="opción español">
                </div>
                <div class="flags__item" data-language="en" onclick="changeLanguage('en')">
                    <img src="../../img/en.svg" alt="opción inglés">
                </div>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>