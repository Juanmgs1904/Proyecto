<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesC extends conexion {

    public function listalotesC($matricula){
        $sentencia = "SELECT * FROM lleva JOIN lotes ON lleva.IDL = lotes.IDL WHERE lotes.Estado = 'asignado' AND lleva.Matricula='$matricula' AND fEntrega IS NULL";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>