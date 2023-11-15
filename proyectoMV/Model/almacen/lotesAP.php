<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesAP extends conexion
{
    public function listaLotesAP()
    {
        $sentencia = "SELECT lotes.IDL FROM lotes JOIN va_hacia ON va_hacia.IDL = lotes.IDL 
                          WHERE Estado = 'noAsignado'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
