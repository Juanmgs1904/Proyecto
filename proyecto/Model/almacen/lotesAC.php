<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesAC extends conexion {

    public function listaLotesAC(){
        $sentencia1 = "SELECT IDL FROM contiene";
        $sentencia = "SELECT lotes.IDL FROM lotes JOIN va_hacia ON va_hacia.IDL = lotes.IDL 
        WHERE Estado = 'noAsignado' AND lotes.IDL IN ($sentencia1)";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>