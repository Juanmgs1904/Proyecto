<?php
$ubicacion = $_POST['ubicacion'];
$Direccion = $_POST['Direccion'];
$conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");
$sentencia = "INSERT INTO almacen (ubicacion, Direccion) 
                VALUES('$ubicacion', '$Direccion')";
$filas = $conexion->query($sentencia);
header("Location: almacen_index.php");
?>