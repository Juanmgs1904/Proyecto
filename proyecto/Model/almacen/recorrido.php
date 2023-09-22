<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class recorrido extends conexion
{

    private $IDR = "";

    public function listaHoras()
    {
        $sentencia = "SELECT IDR FROM recorrido";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post()
    {
        $_respuestas = new respuestas;

        $respuestaId = $this->altaHora();
        if ($respuestaId) {
            $respuesta = $_respuestas->respuesta;
            $respuesta['resultado'] = array(
                "Se marcó la hora de llegada del camión" => $respuestaId
            );
            return $respuesta;
        } else {
            return $_respuestas->error_500();
        }
    }


    private function altaHora()
    {
        $sentencia = "INSERT INTO recorrido(IDR) VALUES (NULL)";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta) {
            return $respuesta;
        } else {
            return 0;
        }
    }


    public function delete($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['IDR'])) {
            return $_respuestas->error_400();
        } else {
            $this->IDR = $datos['IDR'];
            $respuestaFilas = $this->eliminarHora();
            if ($respuestaFilas) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->IDR
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora()
    {
        $sentencia = "DELETE FROM recorrido WHERE IDR = '" . $this->IDR . "'";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta >= 1) {
            return $respuesta;
        } else {
            return 0;
        }
    }
}
