<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class asignarLote extends conexion {

    private $IDL = "";
    private $Matricula = "";

    public function listaLAC(){
        $sentencia = "SELECT IDL, Matricula FROM lleva";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['IDL']) || !isset($datos['Matricula'])){
            return $_respuestas->error_400();
        }else{
            $this->IDL = $datos['IDL'];
            $this->Matricula = $datos['Matricula'];
            $respuestaId = $this->altaLAC();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de llegada del camión" => $this->IDL
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaLAC(){
        $sentencia = "INSERT INTO lleva(IDL,Matricula)
        VALUES
        ('".$this->IDL."','". $this->Matricula."')";
        $sentencia2 = "UPDATE lotes SET estado = 'Asignado' WHERE IDL = ".$this->IDL."";
        $respuesta = parent::guardar($sentencia);
        parent::guardar($sentencia2);
        if($respuesta){
            return $respuesta;
        }else{
            return 0;
        }
    }

        public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['IDL']) || !isset($datos['Matricula'])){
            return $_respuestas->error_400();
        }else{
            $this->IDL = $datos['IDL'];
            $this->Matricula = $datos['Matricula'];
            $respuestaFilas = $this->modificarLAC();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la hora de llegada del camión" => $this->IDL
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarLAC(){
        $sentencia = "UPDATE lleva SET Matricula = '". $this->Matricula . "' WHERE IDL = '" . $this->IDL . "'";
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
        if(!isset($datos['IDL'])){
            return $_respuestas->error_400();
        }else{
            $this->IDL = $datos['IDL'];
            $respuestaFilas = $this->eliminarLAC();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->IDL
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarLAC(){
        $sentencia = "DELETE FROM lleva WHERE IDL = '" . $this->IDL . "'";
        $sentencia2 = "UPDATE lotes SET Estado = 'NoAsignado' WHERE IDL = ".$this->IDL."";
        $respuesta = parent::guardar($sentencia);
        parent::guardar($sentencia2);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>