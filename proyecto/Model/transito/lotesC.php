<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesC extends conexion {

    public function listalotesC(){
        $sentencia = "SELECT * FROM lleva join lotes on lleva.IDL = lotes.IDL where lotes.Estado = 'Asignado'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>