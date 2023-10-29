<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesALE extends conexion {

    public function listaPaquetesAL($empresa){
        $sentencia = "SELECT * FROM paquetes WHERE Estado = 'enAlmacenExterno' AND Empresa = '$empresa'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
