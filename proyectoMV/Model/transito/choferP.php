<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class choferP extends conexion {

    public function listaChoferes($matricula){
        $sentencia = "SELECT personas.Nombre, conduce.* FROM conduce JOIN personas ON conduce.CIC = CI 
        WHERE conduce.MatriculaV = '$matricula'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>