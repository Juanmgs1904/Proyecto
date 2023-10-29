<?php
$empresa = $_GET['empresa'];
$url = "http://localhost/proyecto/controller/almacen/C_lotesE.php?empresa=$empresa";
require("../../../intermediario/getDataAPI.php");

require("../../../Model/session/session_almacen2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes</title>
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
                    <a href="../../../index.php">
                        <li class="cerrar">Cerrar Sesión</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2>LOTES DEL ALMACÉN</h2>
        </div>

        <div class="lotes_grid">
            <div class="datos pFilaH">ID</div>
            <div class="datos pFilaH">Estado</div>
            <div class="datos pFilaH">Peso</div>
            <div class="datos pFilaH">OPCIONES</div>
            <?php
            foreach ($array as $fila) {
            ?>
                <div class="datos pFilaV">ID</div>
                <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                <div class="datos pFilaV">Estado</div>
                <div class="datos"><?php echo $fila['Estado'] . " "; ?></div>
                <div class="datos pFilaV">Peso</div>
                <div class="datos"><?php echo $fila['Peso'] . " "; ?></div>
                <div class="datos pFilaV">OPCIONES</div>
                <?php
                $id = $fila['IDL'];
                ?>
                <div class="op">
                    <?php
                    echo '<a href="loteE.php?id='.$id.'&empresa='.$empresa.'">' . '<div class="option">Ver Remito</div>' . ' </a>';
                    echo '<a href="#" onclick="confirmDelete(\''  . $fila['IDL'] . '\', \'' . $empresa . '\');">' . '<div class="option">Eliminar</div></a>';
                    ?>
                    <script>
                        function confirmDelete(IDL,empresa) {
                            var confirmation = confirm("¿Estás seguro de que deseas eliminar este Lote?");
                            if (confirmation) {
                                // Si el usuario confirma, redirige a la página de eliminación
                                window.location.href = "../../../intermediario/deleteDataAPI.php?idE=" + IDL + "&empresa=" + empresa;
                            }
                        }
                    </script>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="botones">
        <div class="btn_volver">
            <?php echo '<a href="../indexExterno.php?empresa='.$empresa.'" class="btn">'; ?>Volver</a>
        </div>
        <div class="btn_tabla">
        <?php echo '<a href="agregar_loteE.php?empresa='.$empresa.'" class="btn">Agregar Lote</a>'; ?>
        </div>

    </div>
</body>

</html>