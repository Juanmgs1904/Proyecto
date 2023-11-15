<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesP extends conexion {

    public function listalotesP($codigo){
        $sentencia = "SELECT * FROM lotes JOIN contiene ON lotes.IDL = contiene.IDL WHERE contiene.codigo = '$codigo' AND lotes.Destino != 'Montevideo'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
}
?>