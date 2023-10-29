<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class asignarPAL extends conexion {

    private $codigo = "";
    private $IDL = "";

    public function listaPAL(){
        $sentencia = "SELECT codigo, IDL FROM vwPaquetesContiene";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['codigo']) || !isset($datos['IDL'])){
            return $_respuestas->error_400();
        }else{
            $this->codigo = $datos['codigo'];
            $this->IDL = $datos['IDL'];
            $respuestaId = $this->altaPAL();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de llegada del camión" => $this->codigo
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaPAL(){
        $sentencia = "INSERT INTO contiene(codigo,IDL)
        VALUES
        ('".$this->codigo."','". $this->IDL."')";
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
        if(!isset($datos['codigo']) || !isset($datos['IDL'])){
            return $_respuestas->error_400();
        }else{
            $this->codigo = $datos['codigo'];
            $this->IDL = $datos['IDL'];
            $respuestaFilas = $this->modificarPAL();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la hora de llegada del camión" => $this->codigo
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarPAL(){
        $sentencia = "UPDATE contiene SET IDL = '". $this->IDL . "' WHERE codigo = '" . $this->codigo . "'";
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
        if(!isset($datos['codigo'])){
            return $_respuestas->error_400();
        }else{
            $this->codigo = $datos['codigo'];
            $respuestaFilas = $this->eliminarPAL();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->codigo
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarPAL(){
        $sentencia = "DELETE FROM contiene WHERE codigo = '" . $this->codigo . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>