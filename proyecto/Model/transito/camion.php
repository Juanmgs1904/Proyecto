<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class camion extends conexion {

    public function listaCamiones(){
        $sentencia = "SELECT Matricula FROM camion";//Después cambiar a la relación lleva
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>