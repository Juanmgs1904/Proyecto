<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class salida extends conexion {

    private $matriculaC = "";
    private $fSalida = "";

    public function listaHoras(){
        $sentencia = "SELECT MatriculaC, FechaSalida FROM va_salida";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matriculaC']) || !isset($datos['fechaSalida'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->fSalida = $datos['fechaSalida'];
            $respuestaId = $this->altaHora();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de salida del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaHora(){
        $sentencia = "INSERT INTO va_salida(MatriculaC,FechaSalida)
        VALUES
        ('".$this->matriculaC."','". $this->fSalida."')";
        $respuesta = parent::guardar($sentencia);
        if($respuesta){
            return $respuesta;
        }else{
            return 0;
        }
    }

        public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matriculaC']) || !isset($datos['fechaSalida'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->fSalida = $datos['fechaSalida'];
            $respuestaFilas = $this->modificarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la hora de salida del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarHora(){
        $sentencia = "UPDATE va_salida SET FechaSalida = '" . $this->fSalida . "' WHERE MatriculaC = '" . $this->matriculaC . "'";
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
        if(!isset($datos['matriculaC']) || !isset($datos['fechaSalida'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->fSalida = $datos['fechaSalida'];
            $respuestaFilas = $this->eliminarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la salida del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora(){
        $sentencia = "DELETE FROM va_salida WHERE MatriculaC = '" . $this->matriculaC . "' AND FechaSalida = '" . $this->fSalida . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>