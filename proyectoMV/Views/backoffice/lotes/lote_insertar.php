<?php
$Peso = $_POST['Peso'];
$Estado = $_POST['Estado'];
$Destino = $_POST['Destino'];
$tiempoEstimado = $_POST['tiempoEstimado'];
$conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
$sentencia = "INSERT INTO lotes (Peso, Estado, Destino, tiempoEstimado) 
                VALUES('$Peso', '$Estado', '$Destino', '$tiempoEstimado')";
$filas = $conexion->query($sentencia);
header("Location: lote_index.php");
?>