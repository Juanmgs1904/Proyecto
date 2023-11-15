<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class llegada extends conexion {

    private $matriculaC = "";
    private $fLlegada = "";

    public function listaHoras($idA){
        $sentencia1 = "SELECT MatriculaC FROM va WHERE idI = $idA";
        $sentencia2 = "SELECT MatriculaC, FechaLlegada FROM va_llegada WHERE MatriculaC IN ($sentencia1)";
        $arrayDatos = parent::obtenerDatos($sentencia2);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matriculaC']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->fLlegada = $datos['fechaLlegada'];
            $respuestaId = $this->altaHora();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de llegada del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaHora(){
        $sentencia = "INSERT INTO va_llegada(MatriculaC,FechaLlegada)
        VALUES
        ('".$this->matriculaC."','". $this->fLlegada."')";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }

        public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matriculaC']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->fLlegada = $datos['fechaLlegada'];
            $respuestaFilas = $this->modificarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la hora de llegada del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarHora(){
        $sentencia = "UPDATE va_llegada SET FechaLlegada = '" . $this->fLlegada . "' WHERE MatriculaC = '" . $this->matriculaC . "'";
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
        if(!isset($datos['matriculaC']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->fLlegada = $datos['fechaLlegada'];
            $respuestaFilas = $this->eliminarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora(){
        $sentencia = "SELECT MAX(FechaLlegada) AS fecha_mayor FROM va_llegada WHERE MatriculaC = '" . $this->matriculaC . "'";
        $fecha_mayor = parent::obtenerDatos($sentencia);
        if($fecha_mayor[0]["fecha_mayor"] == $this->fLlegada){
            $sentencia1 = "UPDATE vehiculo SET Disponibilidad = 'enRuta' WHERE MatriculaV = '" . $this->matriculaC . "'";
            $respuesta = parent::guardar($sentencia1);
        }
        $sentencia2 = "DELETE FROM va_llegada WHERE MatriculaC = '" . $this->matriculaC . "' AND FechaLlegada = '" . $this->fLlegada . "'";
        $respuesta = parent::guardar($sentencia2);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>