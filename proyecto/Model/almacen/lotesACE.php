<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesACE extends conexion {

    public function listaLotesACE($empresa){
        $sentencia = "SELECT IDL FROM vwlotesexternosnoasignadosencontiene WHERE Empresa = '$empresa'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>