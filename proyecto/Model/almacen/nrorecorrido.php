<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class nrorecorrido extends conexion {

    private $IDR = "";
    private $nroRuta = "";

    public function listaHoras(){
        $sentencia = "SELECT IDR, nroRuta FROM nrorecorrido";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['IDR']) || !isset($datos['nroRuta'])){
            return $_respuestas->error_400();
        }else{
            $this->IDR = $datos['IDR'];
            $this->nroRuta = $datos['nroRuta'];
            $respuestaId = $this->altaHora();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se agregó el recorrido con id " => $this->IDR
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaHora(){
        $sentencia = "INSERT INTO nrorecorrido(IDR,nroRuta)
        VALUES
        ('".$this->IDR."','". $this->nroRuta."')";
        $respuesta = parent::guardar($sentencia);
        $sentencia2 = "SELECT idI FROM almaceninterno WHERE ruta = ". $this->nroRuta."";
        $sentencia3 = "INSERT INTO esta(IDR,IDA) VALUES ('".$this->IDR."',($sentencia2))";
        $respuesta = parent::guardar($sentencia3);
        if($respuesta){
            return $respuesta;
        }else{
            return 0;
        }
    }

    
    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['IDR']) && !isset($datos['nroRuta'])){
            return $_respuestas->error_400();
        }else{
            $this->IDR = $datos['IDR'];
            $this->nroRuta = $datos['nroRuta'];
            $respuestaFilas = $this->eliminarRecorrido();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó el recorrido con IDR " => $this->IDR,
                    "y con numero de ruta " => $this->nroRuta
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarRecorrido(){
        $sentencia = "SELECT idI FROM almaceninterno WHERE ruta = ". $this->nroRuta."";
        $sentencia2 = "DELETE FROM esta WHERE IDA = ($sentencia) AND IDR = ". $this->IDR."";
        $respuesta = parent::guardar($sentencia2);
        $sentencia3 = "DELETE FROM nrorecorrido WHERE IDR = '" . $this->IDR . "' AND nroRuta = '" . $this->nroRuta . "'";
        $respuesta = parent::guardar($sentencia3);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>