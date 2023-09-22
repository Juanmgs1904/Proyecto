<?php
$conexion = new mysqli("localhost", "root", "", "proyecto");

//lote
if (isset($_POST['IDL'])) {
    $IDL = $_POST['IDL'];
    $Peso = $_POST['Peso'];
    $Estado = $_POST['Estado'];
    $Destino = $_POST['Destino'];
    $Ruta = $_POST['Ruta'];
    $idI = $_POST['idI'];
    $tiempoEstimado = $_POST['tiempoEstimado'];
    $sentencia = "UPDATE lotes SET  Peso='$Peso', Estado='$Estado', Destino='$Destino', Ruta='$Ruta', tiempoEstimado='$tiempoEstimado', idI='$idI' WHERE IDL = $IDL";
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
    $sentencia = "UPDATE paquetes SET  Peso='$Peso', Estado='$Estado', fRecibo='$fRecibo', fEntrega='$fEntrega', Destinatario='$Destinatario', Destino='$Destino' WHERE codigo = $codigo";
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
    $conexion = new mysqli("localhost", "root", "", "proyecto");
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
    $conexion = new mysqli("localhost", "root", "", "proyecto");
    $sentencia = "UPDATE vehiculo SET  Estado='$Estado', Disponibilidad='$Disponibilidad' WHERE MatriculaV = '$MatriculaV'";
    $conexion->query($sentencia);
    header("Location: vehiculos/vehiculo/vehiculo_index.php");
}

//almacen
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $ubicacion = $_POST['ubicacion'];
    $ruta = $_POST['ruta'];
    $sentencia = "UPDATE almacen SET  ubicacion='$ubicacion', ruta=$ruta WHERE id = $id";
    $conexion->query($sentencia);
    header("Location: almacenes/almacen/almacen_index.php");
}



//almacenExterno
if (isset($_POST['idE'])) {
    $idE = $_POST['idE'];
    $Empresa = $_POST['Empresa'];
    $sentencia = "UPDATE almacenExterno SET  Empresa='$Empresa' WHERE idE = $idE";
    $conexion->query($sentencia);
    header("Location: almacenes/almacenExterno/almacenExterno_index.php");
}



//camionero
if (isset($_POST['ciC'])) {
    $ciC = $_POST['ciC'];
    $fechaVL = $_POST['fechaVL'];
    $turno = $_POST['Turno'];
    $sentencia = "UPDATE camionero SET  fechaVL='$fechaVL', turno=$turno WHERE CIC = $ciC";
    $conexion->query($sentencia);
    header("Location: usuarios/camionero/camionero_index.php");
}



//personal
if (isset($_POST['ciP'])) {
    $ciP = $_POST['ciP'];
    $cargo = $_POST['cargo'];
    $fechaN = $_POST['fechaN'];
    $sentencia = "UPDATE personal SET Cargo='$cargo',FechaNacimiento='$fechaN' WHERE CIP = $ciP";
    $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}


//personas
if (isset($_POST['ci'])) {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $tel = $_POST['tel'];
    $dir = $_POST['dir'];
    $sentencia = "UPDATE personas SET  Nombre='$nombre',
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

//Remito
if (isset($_POST['IDR']) && isset($_POST['Destinatario'])) {
    $IDR = $_POST['IDR'];
    $Destinatario = $_POST['Destinatario'];
    $Destino = $_POST['Destino'];
    $Ruta = $_POST['Ruta'];
    
    $TiempoEstimado = $_POST['TiempoEstimado'];
    $sentencia = "UPDATE remito SET  IDR='$IDR',Destinatario='$Destinatario',Destino='$Destino',Ruta='$Ruta',TiempoEstimado='$TiempoEstimado' WHERE IDR = '$IDR'";
    $conexion->query($sentencia);
    header("Location: remitos/remito/remito_index.php");
}
