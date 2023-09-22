<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesAL extends conexion {

    public function listaPaquetesAL(){
        
        session_start();
        $app=$_SESSION['rol'];
        if ($app=="AlmacenExterno") {
            $sentencia = "SELECT * FROM paquetes WHERE Estado = 'enAlmacenExterno'";
        } else {
            $sentencia = "SELECT * FROM paquetes WHERE Estado != 'Entregado' AND Estado != 'LoteAsignado' AND Estado != 'CamionetaAsignada' AND Estado != 'enAlmacenExterno'";
        }
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>