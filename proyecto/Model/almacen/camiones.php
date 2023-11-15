<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class camiones extends conexion {
    private $matricula;
    private $disponibilidad;

    public function listaCamiones(){
        $sentencia = "SELECT Matricula FROM camion";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }

    public function camionesRuta(){
        $sentencia = "SELECT Matricula FROM vwcamionenruta";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function camionesInterno(){
        $sentencia = "SELECT Matricula FROM vwcamion_interno";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function camionesExterno(){
        $sentencia = "SELECT Matricula FROM vwcamion_externo";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function camionesDisponibles(){
        $sentencia = "SELECT Matricula FROM vwbuenestadocamion";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }

    public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['Disponibilidad']) || !isset($datos['Matricula'])){
            return $_respuestas->error_400();
        }else{
            $this->matricula = $datos['Matricula'];
            $this->disponibilidad = $datos['Disponibilidad'];
            $respuestaFilas = $this->modificarEstado();
            if($respuestaFilas){
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó el estado del camión " => $this->matricula
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }
     }   
     private function modificarEstado(){
        $sentencia = "UPDATE vehiculo SET Disponibilidad = '". $this->disponibilidad . "' 
                     WHERE MatriculaV = '" . $this->matricula . "'";
        $respuesta = parent::guardar($sentencia);
        if($respuesta >= 1){
            return $respuesta;
        }else{
            return 0;
        }
    }
}
?>