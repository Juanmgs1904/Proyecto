<?php
$Peso = $_POST['Peso'];
$Estado = $_POST['Estado'];
$fRecibo = $_POST['fRecibo'];
$fEntrega = $_POST['fEntrega'];
$Destinatario = $_POST['Destinatario'];
$Destino = $_POST['Destino'];
$conexion = new mysqli("localhost", "root", "", "ocean");
$sentencia = "INSERT INTO paquetes (Peso, Estado, fRecibo, fEntrega, Destinatario, Destino) 
                VALUES('$Peso', '$Estado', '$fRecibo', '$fEntrega', '$Destinatario', '$Destino')";
$filas = $conexion->query($sentencia);
header("Location: paquete_index.php");
?>