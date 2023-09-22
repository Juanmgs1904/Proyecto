<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesAC extends conexion
{

    public function listaPaquetesAC()
    {
        $sentencia1 = "SELECT lotes.IDL FROM lotes
        INNER JOIN contiene ON lotes.IDL = contiene.IDL
        WHERE lotes.idI = 16 AND lotes.Estado = 'Entregado'";

        $sentencia2 = "SELECT paquetes.codigo FROM paquetes
        INNER JOIN contiene ON paquetes.codigo = contiene.codigo
        WHERE contiene.IDL IN ($sentencia1) AND Estado = 'loteDesarmado' AND paquetes.codigo NOT IN (SELECT codigo FROM transporta)";

        $arrayDatos = parent::obtenerDatos($sentencia2);
        return $arrayDatos;
    }
}
