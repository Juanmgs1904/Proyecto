<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class almacenE extends conexion {

    public function listaAlmacenesE(){
        $sentencia = "SELECT idE FROM almacenexterno";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>