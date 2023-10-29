<?php
$Peso = $_POST['Peso'];
$Estado = $_POST['Estado'];
$Destino = $_POST['Destino'];
$IDR = $_POST['IDR'];
$IDA = $_POST['IDA'];
$tiempoEstimado = $_POST['tiempoEstimado'];
$conexion = new mysqli("localhost", "root", "", "ocean");
$sentencia = "INSERT INTO lotes (Peso, Estado, Destino, tiempoEstimado, IDR, IDA) 
                VALUES('$Peso', '$Estado', '$Destino', '$tiempoEstimado', '$IDR', '$IDA')";
$filas = $conexion->query($sentencia);
header("Location: lote_index.php");
?>