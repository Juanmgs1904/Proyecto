<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class vaHacia extends conexion {

    private $IDR = "";
    private $IDA = "";
    private $IDL = "";

    public function listaLotesR(){
        $sentencia1 = "SELECT IDL FROM vwlotesnoasignados";
        $sentencia = "SELECT IDL, IDA, IDR, ubicacion FROM va_hacia 
        JOIN almacen ON va_hacia.IDA = almacen.id WHERE IDL IN ($sentencia1)";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function listaLotesSA(){
        $sentencia = "SELECT * FROM vwlotesnoasignadosarecorridos";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['IDR']) || !isset($datos['IDA']) || !isset($datos['IDL'])){
            return $_respuestas->error_400();
        }else{
            $this->IDR = $datos['IDR'];
            $this->IDA = $datos['IDA'];
            $this->IDL = $datos['IDL'];
            $respuestaId = $this->altaLote();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se agrego a un lote el recorrido" => $this->IDR
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaLote(){
        $sentencia = "INSERT INTO va_hacia(IDR,IDA,IDL)
        VALUES
        ('".$this->IDR."','". $this->IDA."','". $this->IDL."')";
        $respuesta = parent::guardar($sentencia);
        if($respuesta){
            return $respuesta;
        }else{
            return 0;
        }
    }
    
    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['IDL'])){
            return $_respuestas->error_400();
        }else{
            $this->IDL = $datos['IDL'];
            $respuestaFilas = $this->eliminarLote();
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
    private function eliminarLote(){
        $sentencia = "DELETE FROM va_hacia WHERE IDL = '" . $this->IDL . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>