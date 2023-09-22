<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class lotes extends conexion {

    private $idL = "";
    private $peso = "";
    private $estado = "";
    private $destino = "";
    private $ruta = "";
    private $tiempoEstimado = "";
    private $idI = "";

    public function listaLotes($idA){
        if($idA == 1){
            $sentencia = "SELECT IDL,Peso,Estado,idI FROM lotes WHERE Estado = 'No Asignado'";
        }else{
            $sentencia = "SELECT IDL,Peso,Estado,idI FROM lotes WHERE idI = '$idA' && Estado = 'Entregado'";
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
        if(!isset($datos['estado']) || !isset($datos['destino']) || !isset($datos['ruta']) || !isset($datos['tiempoEstimado']) || !isset($datos['idI'])){
            return $_respuestas->error_400();
        }else{
            $this->estado = $datos['estado'];
            $this->destino = $datos['destino'];
            $this->ruta = $datos['ruta'];
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
        $sentencia = "INSERT INTO lotes(Peso,Estado,Destino,Ruta,tiempoEstimado,idI)
        VALUES
        ('".$this->peso."','". $this->estado."','". $this->destino."','". $this->ruta."','". $this->tiempoEstimado."','". $this->idI."')";
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
        if(!isset($datos['idL']) || !isset($datos['estado']) || !isset($datos['destino']) || !isset($datos['ruta']) || !isset($datos['tiempoEstimado']) || !isset($datos['idI'])){
            return $_respuestas->error_400();
        }else{
            $this->idL = $datos['idL'];
            $this->estado = $datos['estado'];
            $this->destino = $datos['destino'];
            $this->ruta = $datos['ruta'];
            $this->tiempoEstimado = $datos['tiempoEstimado'];
            $this->idI = $datos['idI'];
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
        Ruta = '". $this->ruta ."',
        tiempoEstimado = '". $this->tiempoEstimado ."',
        idI = '". $this->idI . "' WHERE IDL = '" . $this->idL . "'";
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