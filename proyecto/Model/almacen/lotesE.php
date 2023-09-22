<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotesE extends conexion {

    private $idL = "";
    private $peso = "";
    private $estado = "";
    private $destino = "";
    private $tiempoEstimado = "";
    private $idI = "";
    private $almacenExterno = "";

    public function listaLotesE(){
        $sentencia = "SELECT * FROM lotes WHERE enAlmacenExterno = 1";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['estado']) || !isset($datos['destino']) || !isset($datos['almacenExterno']) || !isset($datos['tiempoEstimado']) || !isset($datos['idI'])){
            return $_respuestas->error_400();
        }else{
            $this->estado = $datos['estado'];
            $this->destino = $datos['destino'];
            $this->almacenExterno = $datos['almacenExterno'];
            $this->tiempoEstimado = $datos['tiempoEstimado'];
            $this->idI = $datos['idI'];
            if(isset($datos['peso'])){ $this->peso = $datos['peso']; }
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
        $sentencia = "INSERT INTO lotes(Peso,Estado,Destino,enAlmacenExterno,tiempoEstimado,idI)
        VALUES
        ('".$this->peso."','". $this->estado."','". $this->destino."','". $this->almacenExterno."','". $this->tiempoEstimado."','". $this->idI."')";
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