<?php
$ubicacion = $_POST['ubicacion'];
$ruta = $_POST['ruta'];
$conexion = new mysqli("localhost", "root", "", "proyecto");
$sentencia = "INSERT INTO almacen (ubicacion, ruta) 
                VALUES('$ubicacion', '$ruta')";
$filas = $conexion->query($sentencia);
header("Location: almacen_index.php");
?>