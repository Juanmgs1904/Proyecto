<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesAL extends conexion {

    public function listaPaquetesAL(){
        $sentencia = "SELECT * FROM paquetes WHERE Estado = 'enCentral'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>