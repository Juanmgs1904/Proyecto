<?php
$url = 'http://localhost/proyecto/controller/almacen/C_vaHacia.php';
require("../../../intermediario/getDataAPI.php");
require("../../../Model/session/session_almacenInterno3.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes Asignados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

</head>

<body class="fondo">
    <div class="tabla__contenedor">
        <div class="titulo">
            <h2>Lotes Asignados a Recorridos</h2>
        </div>
        <div class="lote_grid">
            <div class="datos pFila">IDL</div>
            <div class="datos pFila">IDR</div>
            <div class="datos pFila">IDA</div>
            <div class="datos pFila">OPCIONES</div>
            <?php
            foreach ($array as $fila) {
            ?>
                <div class="datos"><?php echo $fila['IDL'] . " "; ?></div>
                <div class="datos"><?php echo $fila['IDR'] . " "; ?></div>
                <div class="datos"><?php echo $fila['IDA'] . " "; ?></div>
                <div class="datos">
                    <?php            
                    echo '<a href="#" onclick="confirmDelete(\''  . $fila['IDL'] . '\');">' . 'Eliminar'  . '</a>';
                    ?>
                    <script>
                        function confirmDelete(IDL) {
                            var confirmation = confirm("¿Estás seguro de que deseas eliminar este lote del recorrido?");
                            if (confirmation) {
                                // Si el usuario confirma, redirige a la página de eliminación
                                window.location.href = "../../../intermediario/deleteDataAPI.php?IDLAR=" + IDL;
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
        <?php echo '<a href="asignar_lote.php" class="btn">'; ?>Volver</a>
    </div>
</body>

</html>