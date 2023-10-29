<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class almacenE extends conexion {

    public function listaAlmacenesE($IDR){
        $sentencia = "SELECT idE FROM almacenexterno WHERE idE NOT IN (SELECT IDA FROM esta WHERE IDR = '$IDR')";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>