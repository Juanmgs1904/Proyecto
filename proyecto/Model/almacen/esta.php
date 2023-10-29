<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class esta extends conexion {

    private $IDR = "";
    private $IDA = "";
    private $distancia = "";

    public function listaHoras(){
        $sentencia = "SELECT * FROM esta";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['IDR']) || !isset($datos['IDA']) || !isset($datos['distancia'])){
            return $_respuestas->error_400();
        }else{
            $this->IDR = $datos['IDR'];
            $this->IDA = $datos['IDA'];
            $this->distancia = $datos['distancia'];
            $respuestaId = $this->altaHora();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de llegada del camión" => $this->IDR
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaHora(){
        $sentencia = "INSERT INTO esta(IDR,IDA,Distancia)
        VALUES
        ('".$this->IDR."','". $this->IDA."','". $this->distancia."')";
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
        if(!isset($datos['IDR']) || !isset($datos['IDA']) || !isset($datos['distancia'])){
            return $_respuestas->error_400();
        }else{
            $this->IDR = $datos['IDR'];
            $this->IDA = $datos['IDA'];
            $this->distancia = $datos['distancia'];
            $respuestaFilas = $this->modificarDistancia();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la distancia del recorrido" => $this->IDR
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarDistancia(){
        $sentencia = "UPDATE esta SET Distancia = '". $this->distancia . "' 
                     WHERE IDR = '" . $this->IDR . "' AND IDA = '" . $this->IDA . "'";
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
        if(!isset($datos['IDR']) && !isset($datos['IDA'])){
            return $_respuestas->error_400();
        }else{
            $this->IDR = $datos['IDR'];
            $this->IDA = $datos['IDA'];
            $respuestaFilas = $this->eliminarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->IDR
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora(){
        $sentencia = "DELETE FROM esta WHERE IDR = '" . $this->IDR . "' AND IDA = '" . $this->IDA . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>