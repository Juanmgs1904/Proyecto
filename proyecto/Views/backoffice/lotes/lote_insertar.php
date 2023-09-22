<?php
$Peso = $_POST['Peso'];
$Estado = $_POST['Estado'];
$Destino = $_POST['Destino'];
$Ruta = $_POST['Ruta'];
$idI = $_POST['idI'];
$tiempoEstimado = $_POST['tiempoEstimado'];
$conexion = new mysqli("localhost", "root", "", "proyecto");
$sentencia = "INSERT INTO lotes (Peso, Estado, Destino, Ruta, tiempoEstimado, idI) 
                VALUES('$Peso', '$Estado', '$Destino', '$Ruta', '$tiempoEstimado', '$idI')";
$filas = $conexion->query($sentencia);
header("Location: lote_index.php");
?>