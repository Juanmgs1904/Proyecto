<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class transporta extends conexion {

    public function listaPaquetes($matricula){
        $sentencia = "SELECT transporta.* FROM transporta join paquetes on transporta.codigo = paquetes.codigo WHERE paquetes.Estado='camionetaAsignada' AND transporta.MatriculaC='$matricula' AND transporta.fEntrega IS NULL";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>