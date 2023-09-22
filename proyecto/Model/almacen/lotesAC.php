<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesAC extends conexion {

    public function listaLotesAC(){
        $sentencia = "SELECT IDL FROM lotes WHERE Estado != 'Entregado' AND Estado != 'Asignado' AND enAlmacenExterno = 0";       
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>