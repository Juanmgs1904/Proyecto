<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesACE extends conexion {

    public function listaLotesACE(){
        $sentencia = "SELECT IDL FROM lotes WHERE Estado != 'Entregado' AND Estado != 'Asignado' AND enAlmacenExterno = 1";
               
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>