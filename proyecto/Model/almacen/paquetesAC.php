<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesAC extends conexion
{

    public function listaPaquetesAC($idA)
    {
        $sentencia1 = "SELECT lotes.IDL FROM lotes
        INNER JOIN contiene ON lotes.IDL = contiene.IDL
        JOIN va_hacia ON va_hacia.IDL = lotes.IDL
        WHERE va_hacia.IDA = '$idA' AND lotes.Estado = 'entregado'";

        $sentencia2 = "SELECT paquetes.* FROM paquetes
        INNER JOIN contiene ON paquetes.codigo = contiene.codigo
        WHERE contiene.IDL IN ($sentencia1) AND Estado = 'loteDesarmado' AND paquetes.codigo NOT IN (SELECT codigo FROM transporta)";

        $arrayDatos = parent::obtenerDatos($sentencia2);
        return $arrayDatos;
    }
}