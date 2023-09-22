<?php
if(isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $conexion = new mysqli("localhost", "root", "", "proyecto");

    // 1. Actualizar el estado del lote a "entregado"
    $actualizarLote = "UPDATE paquetes SET Estado = 'Entregado' WHERE codigo = $codigo";
    $conexion->query($actualizarLote);

    header("Location: tabla_camionetas.php");
}
?>
