<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class va extends conexion {

    private $matriculaC = "";
    private $idI = "";

    public function listaCamionetas($idA){
        $sentencia1 = "SELECT MatriculaC FROM vwBuenEstadoCamioneta";
        $sentencia2 = "SELECT MatriculaC, idI FROM va WHERE idI = $idA AND MatriculaC IN ($sentencia1)";
        $arrayDatos = parent::obtenerDatos($sentencia2);
        return $arrayDatos;
    }
    public function camionetasRuta($idA){
        $sentencia1 = "SELECT MatriculaC FROM vwCamionetaEnRuta";
        $sentencia2 = "SELECT MatriculaC FROM va WHERE idI = $idA AND MatriculaC IN ($sentencia1)";
        $arrayDatos = parent::obtenerDatos($sentencia2);
        return $arrayDatos;
    }
    public function camionetasDisponibles($idA){
        $sentencia1 = "SELECT MatriculaC FROM vwBuenEstadoCamioneta";
        $sentencia2 = "SELECT MatriculaC FROM va WHERE idI = $idA AND MatriculaC IN ($sentencia1)";
        $arrayDatos = parent::obtenerDatos($sentencia2);
        return $arrayDatos;
    }
    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['matriculaC']) || !isset($datos['idI'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->idI = $datos['idI'];
            $respuestaId = $this->altaHora();
            if($respuestaId){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se marcó la hora de llegada del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
        
    }
    private function altaHora(){
        $sentencia = "INSERT INTO va(MatriculaC,idI)
        VALUES
        ('".$this->matriculaC."','". $this->idI."')";
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
        if(!isset($datos['matriculaC']) || !isset($datos['idI'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $this->idI = $datos['idI'];
            $respuestaFilas = $this->modificarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó la hora de llegada del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarHora(){
        $sentencia = "UPDATE va SET idI = '". $this->idI . "' WHERE MatriculaC = '" . $this->matriculaC . "'";
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
        if(!isset($datos['matriculaC'])){
            return $_respuestas->error_400();
        }else{
            $this->matriculaC = $datos['matriculaC'];
            $respuestaFilas = $this->eliminarHora();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó la llegada del camión" => $this->matriculaC
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarHora(){
        $sentencia = "DELETE FROM va WHERE MatriculaC = '" . $this->matriculaC . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>