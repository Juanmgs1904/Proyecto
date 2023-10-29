<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesACE extends conexion {

    public function listaLotesACE(){
        $sentencia = "SELECT IDL FROM vwLotesExternosNoAsignados";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>