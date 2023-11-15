<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesE extends conexion {

    private $idL = "";
    private $tiempoEstimado = "";
    private $empresa = "";
    private $enAlmacenExterno = "";

    public function listaLotesE($empresa){
        $sentencia1 = "SELECT IDL FROM lleva";
        $sentencia = "SELECT * FROM lotes WHERE enAlmacenExterno = 1 AND Empresa = '$empresa' AND IDL NOT IN ($sentencia1)";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['tiempoEstimado']) || !isset($datos['empresa'])|| !isset($datos['enAlmacenExterno'])){
            return $_respuestas->error_400();
        }else{
            $this->tiempoEstimado = $datos['tiempoEstimado'];
            $this->empresa = $datos['empresa'];
            $this->enAlmacenExterno = $datos['enAlmacenExterno'];
            $respuestaId = $this->altaLote();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se añadió el lota con ID" => $respuestaId
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaLote(){
        $sentencia = "INSERT INTO lotes(tiempoEstimado,Empresa,enAlmacenExterno)
        VALUES
        ('".$this->tiempoEstimado."','". $this->empresa."','".$this->enAlmacenExterno."')";
        $respuesta = parent::guardarId($sentencia);
        if($respuesta){
            return $respuesta;
        }else{
            return 0;
        }
    }

    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['idL'])){
            return $_respuestas->error_400();
        }else{
            $this->idL = $datos['idL'];
            $respuestaFilas = $this->eliminarLote();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó el lote con id" => $this->idL
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarLote(){
        $sentencia = "DELETE FROM lotes WHERE IDL = '" . $this->idL . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>