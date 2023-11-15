<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class vaHacia extends conexion {

    public function infoRecorrido($matricula){
        $sentencia = "SELECT lotes.IDL ,va_hacia.IDA, almacen.Ubicacion, almacen.Direccion, esta.Distancia FROM va_hacia 
                     JOIN almacen ON almacen.id = va_hacia.IDA 
                     JOIN esta ON esta.IDA = almacen.id 
                     JOIN lotes ON lotes.IDL = va_hacia.IDL 
                     JOIN lleva ON lleva.IDL = lotes.IDL WHERE lleva.Matricula = '$matricula' AND lotes.Estado = 'asignado'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>