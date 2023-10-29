<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class conduce extends conexion
{
    private $matricula = "";
    private $demora = "";
    private $fDemora = "";

    public function put($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['matricula']) || !isset($datos['demora'])) {
            return $_respuestas->error_400();
        } else {
            $this->matricula = $datos['matricula'];
            $this->demora = $datos['demora'];
            date_default_timezone_set("America/Montevideo");//cambia la fecha y hora por default
            $this->fDemora = date('Y-m-d H:i:s');// Obtiene la fecha y hora actual
            }
            $respuestaFilas = $this->modificarDemora();
            if ($respuestaFilas) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la demora de la camioneta" => $this->matricula
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    private function modificarDemora()
    {
        $sentencia = "UPDATE conduce SET demora = '" . $this->demora . "',fDemora = '" . $this->fDemora . "' WHERE MatriculaV = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta >= 1) {
            return $respuesta;
        } else {
            return 0;
        }
    }
}
