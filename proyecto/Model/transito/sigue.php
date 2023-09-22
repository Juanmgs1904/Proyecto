<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class sigue extends conexion
{
    private $Matricula = "";
    private $IDR = "";
    private $IDA = "";

    public function mostrarMatricula(){
        $sentencia = "SELECT Matricula FROM sigue";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function listaRecorrido($matricula)
    {
        $sentencia1 = "SELECT IDR FROM sigue WHERE Matricula = $matricula";
        $sentencia2 = "SELECT nroRuta FROM nrorecorrido WHERE IDR IN ($sentencia1)";
        $sentencia3 = "SELECT idI FROM almaceninterno WHERE ruta IN ($sentencia2)";
        $arrayDatos = parent::SobtenerDatos($sentencia2,$sentencia3);
        return  $arrayDatos;
    }
    public function post($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['Matricula']) || !isset($datos['IDR']) || !isset($datos['IDA'])) {
            return $_respuestas->error_400();
        } else {
            $this->Matricula = $datos['Matricula'];
            $this->IDR = $datos['IDR'];
            $this->IDR = $datos['IDA'];
            $respuestaId = $this->altaHora();
            if ($respuestaId) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de llegada del camión" => $this->IDR
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    }
    private function altaHora()
    {
        $sentencia = "INSERT INTO sigue(Matricula,IDR,IDA)
        VALUES
        ('" . $this->Matricula . "','" . $this->IDR . "','" .  $this->IDA . "')";
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
        if (!isset($datos['Matricula'])) {
            return $_respuestas->error_400();
        } else {
            $this->Matricula = $datos['Matricula'];
            $respuestaFilas = $this->eliminarHora();
            if ($respuestaFilas) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->Matricula
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora()
    {
        $sentencia = "DELETE FROM sigue WHERE Matricula = '" . $this->Matricula . "'";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta >= 1) {
            return $respuesta;
        } else {
            return 0;
        }
    }
}
