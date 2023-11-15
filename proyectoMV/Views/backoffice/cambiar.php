<?php
$conexion = new mysqli("192.168.5.50", "agustin.gimenez", "56866521", "ocean");

require("../../Model/session/session_administrador.php");

//lote
if (isset($_POST['IDL'])) {
    $IDL = $_POST['IDL'];
    $Peso = $_POST['Peso'];
    $Estado = $_POST['Estado'];
    $Destino = $_POST['Destino'];
    $tiempoEstimado = $_POST['tiempoEstimado'];
    $sentencia = "UPDATE lotes SET  Peso='$Peso', Estado='$Estado', Destino='$Destino', tiempoEstimado='$tiempoEstimado' WHERE IDL = '$IDL'";
    $conexion->query($sentencia);
    header("Location: lotes/lote_index.php");
}

//paquete
if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    $Peso = $_POST['Peso'];
    $Estado = $_POST['Estado'];
    $fRecibo = $_POST['fRecibo'];
    $fEntrega = $_POST['fEntrega'];
    $Destinatario = $_POST['Destinatario'];
    $Destino = $_POST['Destino'];
    $Departamento = $_POST['Departamento'];
    $sentencia = "UPDATE paquetes SET  Peso='$Peso', Estado='$Estado', fRecibo='$fRecibo', fEntrega='$fEntrega', Destinatario='$Destinatario', Destino='$Destino', Departamento='$Departamento' WHERE codigo = '$codigo'";
    $conexion->query($sentencia);
    header("Location: paquete/paquete_index.php");
}


//camion
if (isset($_POST['Matricula'])) {
    $Matricula = $_POST['Matricula'];
    $Peso = $_POST['Peso'];
    $Alto = $_POST['Alto'];
    $Ancho = $_POST['Ancho'];
    $Largo = $_POST['Largo'];
    $Tipo = $_POST['Tipo'];
    $sentencia = "UPDATE camion SET  Peso='$Peso', Alto='$Alto',
                    Ancho='$Ancho',Largo='$Largo',Tipo='$Tipo' WHERE Matricula = '$Matricula'";
    $conexion->query($sentencia);
    header("Location: vehiculos/camiones/camion_index.php");
}

//vehiculo
if (isset($_POST['MatriculaV'])) {
    $MatriculaV = $_POST['MatriculaV'];
    $Estado = $_POST['Estado'];
    $Disponibilidad = $_POST['Disponibilidad'];
    $sentencia = "UPDATE vehiculo SET  Estado='$Estado', Disponibilidad='$Disponibilidad' WHERE MatriculaV = '$MatriculaV'";
    $conexion->query($sentencia);
    header("Location: vehiculos/vehiculo/vehiculo_index.php");
}

//almacen
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $ubicacion = $_POST['ubicacion'];
    $Direccion = $_POST['Direccion'];
    $sentencia = "UPDATE almacen SET ubicacion='$ubicacion', Direccion='$Direccion' WHERE id = '$id'";
    $conexion->query($sentencia);
    header("Location: almacenes/almacen/almacen_index.php");
}



//almacenExterno
if (isset($_POST['idE'])) {
    $idE = $_POST['idE'];
    $Empresa = $_POST['Empresa'];
    $sentencia = "UPDATE almacenexterno SET  Empresa='$Empresa' WHERE idE = '$idE'";
    $conexion->query($sentencia);
    header("Location: almacenes/almacenExterno/almacenExterno_index.php");
}

//almacenInterno
if (isset($_POST['idI'])) {
    $idI = $_POST['idI'];
    $ruta = $_POST['ruta'];
    $sentencia = "UPDATE almaceninterno SET ruta='$ruta' WHERE idI = '$idI'";
    $conexion->query($sentencia);
    header("Location: almacenes/almacenInterno/almacenInterno_index.php");
}

//camionero
if (isset($_POST['ciC'])) {
    $ciC = $_POST['ciC'];
    $FechaVL = $_POST['FechaVL'];
    $Turno = $_POST['Turno'];
    $sentencia = "UPDATE camionero SET FechaVL='$FechaVL', Turno='$Turno' WHERE CIC = '$ciC'";
    $conexion->query($sentencia);
    header("Location: usuarios/camionero/camionero_index.php");
}



//personal
if (isset($_POST['ciP'])) {
    $ciP = $_POST['ciP'];
    $cargo = $_POST['cargo'];
    $fechaN = $_POST['fechaN'];
    $sentencia = "UPDATE personal SET Cargo='$cargo',FechaNacimiento='$fechaN' WHERE CIP = '$ciP'";
    $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}


//personas
if (isset($_POST['ci'])) {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $Mail = $_POST['Mail'];
    $tel = $_POST['tel'];
    $dir = $_POST['dir'];
    $sentencia = "UPDATE personas SET  Nombre='$nombre', Mail='$Mail',
                    Telefono='$tel',Direccion='$dir' WHERE ci = '$ci'";
    $conexion->query($sentencia);
    header("Location: usuarios/personas/personas_index.php");
}



//usuario
if (isset($_POST['mail'])) {
    $mail = $_POST['mail'];
    $contra = $_POST['contra'];
    $estado = $_POST['estado'];
    $rol = $_POST['rol'];
    $sentencia = "UPDATE usuario SET  Mail='$mail',Contraseña='$contra',Estado='$estado',Rol='$rol' WHERE mail = '$mail'";
    $conexion->query($sentencia);
    header("Location: usuarios/usuario/usuario_index.php");
}
