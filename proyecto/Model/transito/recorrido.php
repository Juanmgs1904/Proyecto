<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class recorrido extends conexion {

    public function datosRecorrido($matricula){
        $sentencia = "SELECT va_a.IDA, recorrido.Distancia FROM va_a JOIN recorrido ON va_a.IDR = recorrido.IDR WHERE matricula='$matricula'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>