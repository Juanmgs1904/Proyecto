<?php
$idA = $_GET['idA'];
$url = 'http://localhost/proyecto/controller/almacen/C_salida.php';
require("../../../../intermediario/getDataAPI.php");
require("../../../../Model/session/session_almacen3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Salidas</title>
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
                    <a href="../../../../index.php"><li class="cerrar">Cerrar Sesión</li></a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2>SALIDAS DE CAMIONES</h2>
        </div>
        <div class="grid_llegada">
            <div class="datos pFilaH">MATRÍCULA</div>
            <div class="datos pFilaH">FECHA</div>
            <div class="datos pFilaH">OPCIONES</div>
            <?php
            foreach ($array as $fila) {
            ?><div class="datos pFilaV">MATRÍCULA</div>
                <div class="datos"><?php echo $fila['Matricula'] . " "; ?></div>
                <div class="datos pFilaV">FECHA</div>
                <div class="datos"><?php echo $fila['FechaSalida'] . " "; ?></div>
                <div class="datos pFilaV">OPCIONES</div>
                <?php
                $matricula = $fila['Matricula'];
                ?>
                 <div class="datos">
                    <?php                           
                    echo '<a href="#" onclick="confirmDelete(\''  . $fila['Matricula'] . '\', \'' . $idA . '\', \'' . $fila["FechaSalida"] . '\');">' . '<div class="option">Eliminar</div>' . ' </a>';
                    ?>
                    <script>
                        function confirmDelete(matricula, IDA, FechaSalida) {
                            var confirmation = confirm("¿Estás seguro de que deseas eliminar este paquete de la camioneta?");
                            if (confirmation) {
                                // Si el usuario confirma, redirige a la página de eliminación
                                window.location.href = "../../../../intermediario/deleteDataAPI.php?matriculaS=" + matricula + "&IDA=" + IDA + "&fechaSalida="+ FechaSalida;
                            }
                        }
                    </script>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="btn_volver">
        <?php echo '<a href="../salidaAI.php?idA='.$idA.'" class="btn">'; ?>Volver</a>
    </div>
</body>

</html>