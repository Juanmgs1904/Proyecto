<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class transporta extends conexion {

    public function camionetasTransporta($idA){
        
        $sentencia1 = "SELECT MatriculaC FROM transporta WHERE fEntrega IS NULL";
        $sentencia2 = "SELECT MatriculaC FROM va WHERE idI = $idA AND MatriculaC IN ($sentencia1) 
                       AND MatriculaC IN (SELECT MatriculaV FROM vehiculo WHERE Disponibilidad = 'disponible')";
        $arrayDatos = parent::obtenerDatos($sentencia2);
        return $arrayDatos;
    }
}
?>