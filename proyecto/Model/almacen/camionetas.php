<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class camionetas extends conexion {

    public function listaCamionetas(){
        $sentencia = "SELECT MatriculaC FROM camioneta";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>