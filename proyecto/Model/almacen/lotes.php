<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotes extends conexion {

    private $idL = "";
    private $peso = "";
    private $estado = "";
    private $destino = "";
    private $ruta = "";
    private $tiempoEstimado = "";
    private $enAlmacenExterno = "";

    public function listaLotes(){
        $sentencia = "SELECT * FROM lotes";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function listaLotesAlmacen($idA){
        if($idA == 1){
            $sentencia = "SELECT * FROM vwlotesnoasignados";
        }else{
            $sentencia = "SELECT lotes.* FROM lotes JOIN va_hacia ON lotes.IDL = va_hacia.IDL WHERE va_hacia.IDA = '$idA' && Estado = 'entregado'";
        }
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function mostrarLote($id){
        $sentencia = "SELECT * FROM lotes WHERE IDL = '$id'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['estado']) || !isset($datos['destino']) || !isset($datos['tiempoEstimado'])){
            return $_respuestas->error_400();
        }else{
            $this->estado = $datos['estado'];
            $this->destino = $datos['destino'];
            $this->tiempoEstimado = $datos['tiempoEstimado'];
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
        $sentencia = "INSERT INTO lotes(Peso,Estado,Destino,tiempoEstimado)
        VALUES
        ('".$this->peso."','". $this->estado."','". $this->destino."','". $this->tiempoEstimado."')";
        $respuesta = parent::guardarId($sentencia);
        if($respuesta){
            return $respuesta;
        }else{
            return 0;
        }
    }

        public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['idL']) || !isset($datos['estado']) || !isset($datos['destino']) || !isset($datos['tiempoEstimado'])){
            return $_respuestas->error_400();
        }else{
            $this->idL = $datos['idL'];
            $this->estado = $datos['estado'];
            $this->destino = $datos['destino'];
            $this->tiempoEstimado = $datos['tiempoEstimado'];
            if(isset($datos['peso'])){ $this->peso = $datos['peso']; }
            $respuestaFilas = $this->modificarLote();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó el lote con id" => $this->idL
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarLote(){
        $sentencia = "UPDATE lotes SET Estado = '" . $this->estado . "',
        Peso = '". $this->peso . "',
        Destino = '". $this->destino ."',
        tiempoEstimado = '". $this->tiempoEstimado ."' WHERE IDL = '" . $this->idL . "'";
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