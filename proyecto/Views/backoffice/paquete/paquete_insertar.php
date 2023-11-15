<?php
$Peso = $_POST['Peso'];
$Estado = $_POST['Estado'];
$fRecibo = $_POST['fRecibo'];
$fEntrega = $_POST['fEntrega'];
$Destinatario = $_POST['Destinatario'];
$Destino = $_POST['Destino'];
$Departamento = $_POST['Departamento'];
$conexion = new mysqli("localhost", "root", "", "ocean");
$sentencia = "INSERT INTO paquetes (Peso, Estado, fRecibo, fEntrega, Destinatario, Destino, Departamento) 
                VALUES('$Peso', '$Estado', '$fRecibo', '$fEntrega', '$Destinatario', '$Destino', '$Departamento')";
$filas = $conexion->query($sentencia);
header("Location: paquete_index.php");
?>