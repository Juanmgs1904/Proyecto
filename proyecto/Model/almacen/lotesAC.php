<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesAC extends conexion {

    public function listaLotesAC(){
        session_start();
        if ($_SESSION['rol']=="AlmacenExterno") {
            $sentencia = "SELECT IDL FROM lotes WHERE Estado != 'Entregado' AND Estado != 'Asignado' AND enAlmacenExterno = 1";
        } else {
            $sentencia = "SELECT IDL FROM lotes WHERE Estado != 'Entregado' AND Estado != 'Asignado' AND enAlmacenExterno = 0";
        }
               
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>