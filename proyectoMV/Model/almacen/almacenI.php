<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class almacenI extends conexion {

    public function listaAlmacenesI($IDR){
        $sentencia = "SELECT idI, ubicacion FROM almaceninterno JOIN almacen ON almaceninterno.idI = almacen.id WHERE idI NOT IN (SELECT IDA FROM esta WHERE IDR = '$IDR')";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>