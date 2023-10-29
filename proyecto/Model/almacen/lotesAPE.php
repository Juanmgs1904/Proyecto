<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesAPE extends conexion {
    public function listaLotesAP($empresa){
        $sentencia = "SELECT IDL FROM lotes WHERE Estado = 'noAsignado' AND Empresa = '$empresa' AND enAlmacenExterno = 1";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}