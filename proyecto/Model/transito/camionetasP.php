<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class camionetasP extends conexion {

    public function listaCamionetas($codigo){
        $sentencia = "SELECT MatriculaC,fEntrega FROM transporta WHERE codigo='$codigo'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>