<?php

class conexion {
    private $server;
    private $user;
    private $password;
    private $database;
    private $conexion;

    function __construct(){
        $infoConexion = $this->datosConexion();
        foreach($infoConexion as $dato => $value){//Recorre el array con la info del JSON
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
        }
        $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database);
        if($this->conexion->connect_errno){
            echo "Hay un problema con la conexión";
            die();//Si da un error la conexión, muestra el mensaje y no ejecuta nada más
        }
    }
    private function datosConexion(){//Transforma el JSON a Array
        $direccion = dirname(__FILE__);//Muestra la ruta del archivo
        $jsondata = file_get_contents($direccion . "/" . "config.json");
        return json_decode($jsondata, true);
    }
    public function obtenerDatos($sentencia){//se le pasa la sentencia y forma un array con el resultado
        $resultado = $this->conexion->query($sentencia);
        $array = array();
        foreach($resultado as $key){
            $array[] = $key;//crea una nueva fila en el array
        }
        return $array;
    }
    public function SobtenerDatos($sentencia, $sentencia2){
        $resultado = $this->conexion->query($sentencia);
        $array = array();
        foreach($resultado as $key){
            $array[] = $key;//crea una nueva fila en el array
        }
        $resultado2 = $this->conexion->query($sentencia2);
        foreach($resultado2 as $key){
            $array[] = $key;//crea una nueva fila en el array
        }
        return $array;
    }
    public function guardar($sentencia){//Devulve la cantidad de filas afectadas por la sentencia
        $resultado = $this->conexion->query($sentencia);
        return $this->conexion->affected_rows;
    }


    //Solo se va a usar para insertar cuando hay un ID que se inserta automático
    public function guardarId($sentencia){//Devuleve el ID de la fila que se inserta
        $resultado = $this->conexion->query($sentencia);
        $filas = $this->conexion->affected_rows;
        if($filas >= 1){
            return $this->conexion->insert_id;
        }else{
            return 0;            
        }
    }

    //Sirve para encriptar la contraseña
    //Las funciones protected se pueden usar solo cuando extienda de esta clase, la clase en donde se quiere usar
    protected function encriptar($string){
        return md5($string);//funcion que encripta
    }

    
}

?>