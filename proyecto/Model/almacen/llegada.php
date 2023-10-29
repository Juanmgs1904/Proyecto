<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class llegada extends conexion {

    private $matricula = "";
    private $idA = "";
    private $fLlegada = "";

    public function listaHoras($idA){
        $sentencia = "SELECT Matricula, FechaLlegada FROM va_a_llegada WHERE IDA = $idA";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matricula']) || !isset($datos['idA']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['matricula'];
            $this->idA = $datos['idA'];
            $this->fLlegada = $datos['fechaLlegada'];
            $respuestaId = $this->altaHora();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de llegada del camión" => $this->matricula
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaHora(){
        $sentencia1 = "UPDATE vehiculo SET Disponibilidad = 'Disponible' WHERE MatriculaV = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia1);
        $sentencia2 = "INSERT INTO va_a_llegada(Matricula,IDA,FechaLlegada)
        VALUES
        ('".$this->matricula."','". $this->idA."','". $this->fLlegada."')";
        $respuesta = parent::guardar($sentencia2);
        if($respuesta){
            return $respuesta;
        }else{
            return 0;
        }
    }

        public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matricula']) || !isset($datos['idA']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['matricula'];
            $this->idA = $datos['idA'];
            $this->fLlegada = $datos['fechaLlegada'];
            $respuestaFilas = $this->modificarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la hora de llegada del camión" => $this->matricula
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarHora(){
        $sentencia = "UPDATE va_a_llegada SET FechaLlegada = '" . $this->fLlegada . "',
        IDA = '". $this->idA . "' WHERE Matricula = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
    
    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matricula'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['matricula'];
            $this->idA = $datos['idA'];
            $this->fLlegada = $datos['fechaLlegada'];
            $respuestaFilas = $this->eliminarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->matricula
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora(){
        $sentencia1 = "UPDATE vehiculo SET Disponibilidad = 'En ruta' WHERE MatriculaV = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia1);
        $sentencia2 = "DELETE FROM va_a_llegada WHERE Matricula = '" . $this->matricula . "' AND IDA = '" . $this->idA . "' AND FechaLlegada = '" . $this->fLlegada . "'";
        $respuesta = parent::guardar($sentencia2);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>