<?php
$conexion = new mysqli("localhost", "root", "", "ocean");
//lote
if (isset($_GET['IDL'])) {
    $IDL = $_GET['IDL'];
    $sentencia = "DELETE FROM lotes WHERE IDL = $IDL";
    $filas = $conexion->query($sentencia);
    header("Location: lotes/lote_index.php");
}

//paquete
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $sentencia = "DELETE FROM paquetes WHERE codigo = $codigo";
    $filas = $conexion->query($sentencia);
    header("Location: paquete/paquete_index.php");
}

//camión
if (isset($_GET['Matricula'])) {
    $Matricula = $_GET['Matricula'];
    $sentencia = "DELETE FROM camion WHERE Matricula = '$Matricula'";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/camiones/camion_index.php");
}


//camioneta
if (isset($_GET['MatriculaC'])) {
    $MatriculaC = $_GET['MatriculaC'];
    $sentencia = "DELETE FROM camioneta WHERE MatriculaC = '$MatriculaC'";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/camionetas/camioneta_index.php");
}

//vehiculo
if (isset($_GET['MatriculaV'])) {
    $MatriculaV = $_GET['MatriculaV'];
    $sentencia = "DELETE FROM vehiculo WHERE MatriculaV = '$MatriculaV'";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/vehiculo/vehiculo_index.php");
}

//almacen
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentencia = "DELETE FROM almacen WHERE id = $id";
    $filas = $conexion->query($sentencia);
    header("Location: almacenes/almacen/almacen_index.php");
}


//almacenInterno
if (isset($_GET['idI'])) {
    $idI = $_GET['idI'];
    $sentencia = "DELETE FROM almacenInterno WHERE idI = $idI";
    $filas = $conexion->query($sentencia);
    header("Location: almacenes/almacenInterno/almacenInterno_index.php");
}



//almacenExterno
if (isset($_GET['idE'])) {
    $idE = $_GET['idE'];
    $sentencia = "DELETE FROM almacenExterno WHERE idE = $idE";
    $filas = $conexion->query($sentencia);
    header("Location: almacenes/almacenExterno/almacenExterno_index.php");
}



//camionero
if (isset($_GET['ciC'])) {
    $ciC = $_GET['ciC'];
    $sentencia = "DELETE FROM camionero WHERE CIC = $ciC";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/camionero/camionero_index.php");
}


//conduce
if (isset($_GET['CIC'])) {
    $CIC = $_GET['CIC'];
    $sentencia = "DELETE FROM conduce WHERE CIC = $CIC";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/camionero/conduce_index.php");
}

//personal
if (isset($_GET['ciP'])) {
    $ciP = $_GET['ciP'];
    $sentencia = "DELETE FROM personal WHERE CIP = $ciP";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}


//trabaja
if (isset($_GET['CIP'])) {
    $CIP = $_GET['CIP'];
    $sentencia = "DELETE FROM trabaja WHERE CIP = $CIP";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}

//personas
if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    $sentencia = "DELETE FROM personas WHERE CI = $ci";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personas/personas_index.php");
}



//usuario
if (isset($_GET['Mail'])) {
    $Mail = $_GET['Mail'];
    $sentencia = "DELETE FROM usuario WHERE Mail = '$Mail'";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/usuario/usuario_index.php");
}

//personas
if (isset($_GET['IDR'])) {
    $IDR = $_GET['IDR'];
    $sentencia = "DELETE FROM remito WHERE IDR = $IDR";
    $filas = $conexion->query($sentencia);
    header("Location: remitos/remito/remito_index.php");
}