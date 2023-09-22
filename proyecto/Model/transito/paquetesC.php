<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesC extends conexion {

    public function listaPaquetesC(){
        $sentencia = "SELECT * FROM transporta join paquetes on transporta.codigo = paquetes.codigo where paquetes.Estado='CamionetaAsignada' ";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>