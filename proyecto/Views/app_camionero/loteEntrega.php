<?php
if(isset($_GET['IDL'])) {
    $IDL = $_GET['IDL'];
    $conexion = new mysqli("localhost", "root", "", "proyecto");

    // 1. Actualizar el estado del lote a "entregado"
    $actualizarLote = "UPDATE lotes SET estado = 'Entregado' WHERE IDL = $IDL";
    $conexion->query($actualizarLote);

    // 2. Actualizar el estado de los paquetes a "loteDesarmado"
    $actualizarPaquetes = "UPDATE paquetes SET estado = 'LoteDesarmado' WHERE codigo IN (SELECT codigo FROM contiene WHERE IDL = $IDL)";
    $conexion->query($actualizarPaquetes);

    header("Location: tabla_camiones.php");
}
?>
