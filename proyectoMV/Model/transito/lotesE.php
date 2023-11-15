<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesE extends conexion
{
    private $IDL = "";

    public function put($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['IDL'])) {
            return $_respuestas->error_400();
        } else {
            $this->IDL = $datos['IDL'];
            }
            $respuestaFilas = $this->modificarLote();
            if ($respuestaFilas) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó el lote con ID" => $this->IDL
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    private function modificarLote()
    {
        date_default_timezone_set("America/Montevideo");//cambia la fecha y hora por default
        $date = date("Y-m-d H:i");
        $sentencia = "UPDATE lleva SET fEntrega = '$date' WHERE IDL = '" . $this->IDL . "'";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta >= 1) {
            return $respuesta;
        } else {
            return 0;
        }
    }
}
