<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class camionP extends conexion {

    public function listaCamiones($IDL){
        $sentencia = "SELECT Matricula,fEntrega FROM lleva WHERE IDL='$IDL'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>