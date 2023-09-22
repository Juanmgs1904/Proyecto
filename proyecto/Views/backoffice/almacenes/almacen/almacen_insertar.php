<?php
$ubicacion = $_POST['ubicacion'];
$conexion = new mysqli("localhost", "root", "", "proyecto");
$sentencia = "INSERT INTO almacen (ubicacion) 
                VALUES('$ubicacion')";
$filas = $conexion->query($sentencia);
header("Location: almacen_index.php");
?>