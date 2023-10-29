<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesAP extends conexion {
    public function listaLotesAP($idA){
        if($idA == 1){
            $sentencia = "SELECT lotes.IDL FROM lotes JOIN va_hacia ON va_hacia.IDL = lotes.IDL 
                          WHERE Estado = 'noAsignado' AND va_hacia.IDA != '$idA'";
        }
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}