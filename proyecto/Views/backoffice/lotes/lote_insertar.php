<?php
$Peso = $_POST['Peso'];
$Estado = $_POST['Estado'];
$Destino = $_POST['Destino'];
$tiempoEstimado = $_POST['tiempoEstimado'];
$conexion = new mysqli("localhost", "root", "", "ocean");
$sentencia = "INSERT INTO lotes (Peso, Estado, Destino, tiempoEstimado) 
                VALUES('$Peso', '$Estado', '$Destino', '$tiempoEstimado')";
$filas = $conexion->query($sentencia);
header("Location: lote_index.php");
?>