<?php
class respuestas{
    public $respuesta = [
        'estado' => "ok",
        'resultado' => array()
    ];


    public function error_405(){
        $this->respuesta['estado'] = "error";
        $this->respuesta['resultado'] = array(
            "error_id" => "405",
            "error_msg" => "Metodo no permitido"
        );
        return $this->respuesta;
    }
    
    //el 200 no es un error pero aca se usa cuando el programa funciono bien pero hay otro problema
    //(ej: el usuario que se ingreso no existe)
    public function error_200($string = "Datos incorrectos"){
        $this->respuesta['estado'] = "error";
        $this->respuesta['resultado'] = array(
            "error_id" => "200",
            "error_msg" => $string
        );
        return $this->respuesta;
    }
    public function error_400(){
        $this->respuesta['estado'] = "error";
        $this->respuesta['resultado'] = array(
            "error_id" => "400",
            "error_msg" => "Datos enviados incompletos o con formato incorrecto"
        );
        return $this->respuesta;
    }
    public function error_401(){
        $this->respuesta['estado'] = "error";
        $this->respuesta['resultado'] = array(
            "error_id" => "401",
            "error_msg" => "Se requiere autenticación y ha fallado, o no se ha proporcionado autorización"
        );
        return $this->respuesta;
    }
    public function error_500($string = "Error interno del servidor"){
        $this->respuesta['estado'] = "error";
        $this->respuesta['resultado'] = array(
            "error_id" => "500",
            "error_msg" => $string
        );
        return $this->respuesta;
    }
}
?>