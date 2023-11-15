<?php
$ubicacion = $_POST['ubicacion'];
$Direccion = $_POST['Direccion'];
$conexion = new mysqli("localhost", "root", "", "ocean");
$sentencia = "INSERT INTO almacen (ubicacion, Direccion) 
                VALUES('$ubicacion', '$Direccion')";
$filas = $conexion->query($sentencia);
header("Location: almacen_index.php");
?>