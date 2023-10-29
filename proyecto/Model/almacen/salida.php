<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class salida extends conexion {

    private $matricula = "";
    private $idA = "";
    private $fSalida = "";

    public function listaHoras(){
        $sentencia = "SELECT Matricula, IDA, FechaSalida FROM va_a_salida";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matricula']) || !isset($datos['idA']) || !isset($datos['fechaSalida'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['matricula'];
            $this->idA = $datos['idA'];
            $this->fSalida = $datos['fechaSalida'];
            $respuestaId = $this->altaHora();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de salida del camión" => $this->matricula
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaHora(){
        $sentencia1 = "UPDATE vehiculo SET Disponibilidad = 'En ruta' WHERE MatriculaV = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia1);
        $sentencia2 = "INSERT INTO va_a_salida(Matricula,IDA,FechaSalida)
        VALUES
        ('".$this->matricula."','". $this->idA."','". $this->fSalida."')";
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
        if(!isset($datos['matricula']) || !isset($datos['idA'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['matricula'];
            $this->idA = $datos['idA'];
            $this->fSalida = $datos['fechaSalida'];
            $respuestaFilas = $this->modificarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la hora de salida del camión" => $this->matricula
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarHora(){
        $sentencia = "UPDATE va_a_salida SET FechaSalida = '" . $this->fSalida . "'WHERE Matricula = '" . $this->matricula . "' AND IDA = '" . $this->idA . "'";
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
            $this->fSalida = $datos['fechaSalida'];
            $respuestaFilas = $this->eliminarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la salida del camión" => $this->matricula
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora(){
        $sentencia1 = "UPDATE vehiculo SET Disponibilidad = 'Disponible' WHERE MatriculaV = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia1);
        $sentencia2 = "DELETE FROM va_a_salida WHERE Matricula = '" . $this->matricula . "' AND IDA = '" . $this->idA . "' AND FechaSalida = '" . $this->fSalida . "'";
        $respuesta = parent::guardar($sentencia2);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>