<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class llegada extends conexion {

    private $matriculaC = "";
    private $idI = "";
    private $fLlegada = "";

    public function listaHoras(){
        $sentencia = "SELECT MatriculaC, idI, FechaLlegada FROM va_llegada";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matriculaC']) || !isset($datos['idI']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->idI = $datos['idI'];
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
        $sentencia = "INSERT INTO va_llegada(MatriculaC,idI,FechaLlegada)
        VALUES
        ('".$this->matriculaC."','". $this->idI."','". $this->fLlegada."')";
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
        if(!isset($datos['matriculaC']) || !isset($datos['idI']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->idI = $datos['idI'];
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
        $sentencia = "UPDATE va_llegada SET FechaLlegada = '" . $this->fLlegada . "',
        IDI = '". $this->idI . "' WHERE MatriculaC = '" . $this->matriculaC . "'";
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
        if(!isset($datos['matriculaC']) || !isset($datos['idI']) || !isset($datos['fechaLlegada'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->idI = $datos['idI'];
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
        $sentencia = "DELETE FROM va_llegada WHERE MatriculaC = '" . $this->matriculaC . "' AND idI = '" . $this->idI . "' AND FechaLlegada = '" . $this->fLlegada . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>