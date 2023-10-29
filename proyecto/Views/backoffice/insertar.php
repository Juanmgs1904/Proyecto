<?php
$conexion = new mysqli("localhost", "root", "", "ocean");

//conduce
if (isset($_POST['CIC'])) {
    $CIC = $_POST['CIC'];
    $MatriculaV = $_POST['matriculaV'];
    $sentencia = "INSERT INTO conduce (CIC,MatriculaV) 
                    VALUES('$CIC','$MatriculaV')";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/camionero/camionero_index.php");
}


//personal
if (isset($_POST['CIP'])) {
    $CIP = $_POST['CIP'];
    $IDA = $_POST['IDA'];
    $sentencia = "INSERT INTO trabaja (CIP, IDA) 
                    VALUES('$CIP','$IDA')";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}


//camion
if (isset($_POST['Matricula'])) {
    $Matricula = $_POST['Matricula'];
    $Peso = $_POST['Peso'];
    $Alto = $_POST['Alto'];
    $Ancho = $_POST['Ancho'];
    $Largo = $_POST['Largo'];
    $Tipo = $_POST['Tipo'];
    $sentencia = "INSERT INTO camion (Matricula,Peso,Alto,Ancho,Largo,Tipo) 
                    VALUES('$Matricula','$Peso','$Alto','$Ancho','$Largo','$Tipo')";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/camiones/camion_index.php");
}

//camioneta
if (isset($_POST['MatriculaC'])) {
    $MatriculaC = $_POST['MatriculaC'];
    $sentencia = "INSERT INTO camioneta (MatriculaC) 
                    VALUES('$MatriculaC')";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/camionetas/camioneta_index.php");
}


//vehiculo
if (isset($_POST['MatriculaV'])) {
    $MatriculaV = $_POST['MatriculaV'];
    $Estado = $_POST['Estado'];
    $Disponibilidad = $_POST['Disponibilidad'];
    $sentencia = "INSERT INTO vehiculo (MatriculaV,Estado,Disponibilidad) 
                    VALUES('$MatriculaV','$Estado','$Disponibilidad')";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/vehiculo/vehiculo_index.php");
}

//almacenInterno
if (isset($_POST['idI'])) {
    $idI = $_POST['idI'];
    $ruta = $_POST['ruta'];
    $sentencia = "INSERT INTO almacenInterno (idI, ruta) 
                    VALUES('$idI', '$ruta')";
    $filas = $conexion->query($sentencia);
    header("Location: almacenes/almacenInterno/almacenInterno_index.php");
}



//almacenExterno
if (isset($_POST['idE'])) {
    $idE = $_POST['idE'];
    $Empresa = $_POST['Empresa'];
    $sentencia = "INSERT INTO almacenExterno (idE,Empresa) 
                    VALUES('$idE','$Empresa')";
    $filas = $conexion->query($sentencia);
    header("Location: almacenes/almacenExterno/almacenExterno_index.php");
}




//camionero
if (isset($_POST['ciC'])) {
    $ciC = $_POST['ciC'];
    $fechaVL = $_POST['fechaVL'];
    $turno = $_POST['turno'];
    $sentencia = "INSERT INTO camionero (CIC,FechaVL, Turno) 
                    VALUES('$ciC','$fechaVL', '$turno')";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/camionero/camionero_index.php");
}




//personal
if (isset($_POST['ciP'])) {
    $ciP = $_POST['ciP'];
    $cargo = $_POST['cargo'];
    $fechaN = $_POST['fechaN'];
    $sentencia = "INSERT INTO personal (CIP,Cargo,FechaNacimiento) 
                    VALUES('$ciP','$cargo', '$fechaN')";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}



//personas
if (isset($_POST['ci'])) {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $tel = $_POST['tel'];
    $dir = $_POST['dir'];
    $sentencia = "INSERT INTO personas (CI,Nombre,Telefono,Direccion) 
                    VALUES('$ci','$nombre','$tel','$dir')";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personas/personas_index.php");
}



//usuario
if (isset($_POST['mail'])) {
    $mail = $_POST['mail'];
    $contra = $_POST['contra'];
    $contra = md5($contra);
    $estado = $_POST['estado'];
    $rol = $_POST['rol'];
    $sentencia = "INSERT INTO usuario (Mail,Contraseña,Estado,Rol) 
                    VALUES('$mail','$contra','$estado','$rol')";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/usuario/usuario_index.php");
}
