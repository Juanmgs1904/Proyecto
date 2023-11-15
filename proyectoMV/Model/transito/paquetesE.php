<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesE extends conexion
{
    private $codigo = "";
    private $matricula = "";

    public function put($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['codigo']) || !isset($datos['matricula'])) {
            return $_respuestas->error_400();
        } else {
            $this->codigo = $datos['codigo'];
            $this->matricula = $datos['matricula'];
            }
            $respuestaFilas = $this->modificarPaquete();
            if ($respuestaFilas) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó el paquete con código" => $this->codigo
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    private function modificarPaquete()
    {
        date_default_timezone_set("America/Montevideo");//cambia la fecha y hora por default
        $date = date("Y-m-d H:i");
        $sentencia = "UPDATE transporta SET fEntrega = '$date' WHERE MatriculaC = '" . $this->matricula . "' AND codigo = '". $this->codigo ."'";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta >= 1) {
            return $respuesta;
        } else {
            return 0;
        }
    }
}
