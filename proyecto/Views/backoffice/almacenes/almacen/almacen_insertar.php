<?php
$ubicacion = $_POST['ubicacion'];
$conexion = new mysqli("localhost", "root", "", "ocean");
$sentencia = "INSERT INTO almacen (ubicacion) 
                VALUES('$ubicacion')";
$filas = $conexion->query($sentencia);
header("Location: almacen_index.php");
?>