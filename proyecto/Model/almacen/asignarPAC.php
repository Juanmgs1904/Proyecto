<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class asignarPAC extends conexion {

    private $codigo = "";
    private $MatriculaC = "";

    public function listaPAC(){
        $sentencia = "SELECT codigo, MatriculaC FROM vwpaquetecamioneta";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['codigo']) || !isset($datos['MatriculaC'])){
            return $_respuestas->error_400();
        }else{
            $this->codigo = $datos['codigo'];
            $this->MatriculaC = $datos['MatriculaC'];
            $respuestaId = $this->altaPAC();
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
    private function altaPAC(){
        $sentencia = "INSERT INTO transporta(codigo,MatriculaC)
        VALUES
        ('".$this->codigo."','". $this->MatriculaC."')";
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
        if(!isset($datos['codigo']) || !isset($datos['MatriculaC'])){
            return $_respuestas->error_400();
        }else{
            $this->codigo = $datos['codigo'];
            $this->MatriculaC = $datos['MatriculaC'];
            $respuestaFilas = $this->modificarPAC();
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
     private function modificarPAC(){
        $sentencia = "UPDATE transporta SET MatriculaC = '". $this->MatriculaC . "' WHERE codigo = '" . $this->codigo . "'";
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
            $respuestaFilas = $this->eliminarPAC();
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
    private function eliminarPAC(){
        $sentencia = "DELETE FROM transporta WHERE codigo = '" . $this->codigo . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>