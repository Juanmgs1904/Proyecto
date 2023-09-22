<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class vaA extends conexion {

    private $matricula = "";
    private $idA = "";

    public function listaHoras(){
        $sentencia = "SELECT Matricula, IDA FROM va_a";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matricula']) || !isset($datos['idA'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['matricula'];
            $this->idA = $datos['idA'];
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
        $sentencia = "INSERT INTO va_a(Matricula,IDA)
        VALUES
        ('".$this->matricula."','". $this->idA."')";
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
        if(!isset($datos['matricula']) || !isset($datos['idA'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['matricula'];
            $this->idA = $datos['idA'];
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
        $sentencia = "UPDATE va_a SET IDA = '". $this->idA . "' WHERE Matricula = '" . $this->matricula . "'";
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
        $sentencia = "DELETE FROM va_a WHERE Matricula = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>