<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class almacenI extends conexion {

    public function listaAlmacenesI(){
        $sentencia = "SELECT idI FROM almaceninterno";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>