<?php
require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

class autenticacion extends conexion{
    public function login($json){//verfifca si el usuario existe y si los datos se mandaron correctamente
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if(!isset($datos['mail']) || !isset($datos['contraseña'])){//si en el array no hay mail o contraseña
            return $_respuestas->error_400();
        }else{
            $rol = "";
            $mail = $datos['mail'];
            $idA = $this->obtenerAlmacen($mail);
            $empresa = $this->obtenerEmpresa($mail);
            $matricula = $this->obtenerMatricula($mail);
            $contraseña = $datos['contraseña'];
            $contraseña = parent::encriptar($contraseña);
            $datos = $this->obtenerDatosUsuario($mail);
            if($datos){//si existe el usuario
                //Ve a que aplicación tiene acceso el usuario
                switch($datos[0]['Rol']){
                case 'AlmacenInterno':
                    $rol = "AlmacenInterno";
                break;
                case 'AlmacenExterno':
                    $rol = "AlmacenExterno";
                    break;
                    case 'ChoferCamion':
                    $rol = "ChoferCamion";
                break;  
                case 'ChoferCamioneta':
                    $rol = "ChoferCamioneta";
                break;
                    case 'Administrador':
                    $rol = "Administrador";
                break;     
                default:
                    return $_respuestas->error_200("No tiene acceso a ninguna aplicación");
                break;    
                }
                //Verificar si la contraseña es igual
                if($contraseña == $datos[0]['Contraseña']){//es igual
                     //Verificar si el usuario esta activo
                     if($datos[0]['Estado'] == "Activo"){//esta activo
                        //crear token
                        $token = $this->insertarToken($datos[0]['Mail']);
                        if($token){//si se inserto
                            $resultado = $_respuestas->respuesta;
                            $resultado['resultado'] = array(
                                "token" => $token,
                                "aplicación" => $rol,
                                "idA" => $idA,
                                "matricula" => $matricula,
                                "empresa" => $empresa
                            );
                            return $resultado;
                        }else{//no se inserto
                            return $_respuestas->error_500("Error interno, no hemos podido insertarlo");
                        }
                    }else{//no esta activo
                        return $_respuestas->error_200("El usuario esta inactivo");
                    }
                }else{//no es igual
                    return $_respuestas->error_200("La contraseña no es correcta");
                }
            }else{//si no existe el usuario
                return $_respuestas->error_200("El mail $mail no existe");
            }
        }
    }


    private function obtenerDatosUsuario($mail){
        $sentencia = "SELECT Mail, Contraseña, Estado, Rol FROM usuario WHERE Mail = '$mail'";
        $datos = parent::obtenerDatos($sentencia);
        if(isset($datos[0]['Mail'])){//como el método que se llamo es un array, verifica si en la primera fila hay un valor
            return $datos;
        }else{
            return 0;
        }
    }

    private function obtenerAlmacen($mail){
        $sentencia1 = "SELECT CI FROM personas WHERE Mail = '$mail'";
        $sentencia2 = "SELECT CIP FROM personal WHERE CIP = ($sentencia1)";
        $sentencia3 = "SELECT IDA FROM trabaja WHERE CIP = ($sentencia2)";
        $datos = parent::obtenerDatos($sentencia3);
        if(isset($datos[0]['IDA'])){//como el método que se llamo es un array, verifica si en la primera fila hay un valor
            return $datos[0]['IDA'];
        }else{
            return 0;
        }
    }
    private function obtenerEmpresa($mail){
        $sentencia = "SELECT Empresa FROM usuario WHERE Empresa != 'QuickCarry'";
        $datos = parent::obtenerDatos($sentencia);
        if(isset($datos[0]['Empresa'])){//como el método que se llamo es un array, verifica si en la primera fila hay un valor
            return $datos[0]['Empresa'];
        }else{
            return 0;
        }
    }
    private function obtenerMatricula($mail){
        $sentencia1 = "SELECT CI FROM personas WHERE Mail = '$mail'";
        $sentencia2 = "SELECT CIC FROM camionero WHERE CIC = ($sentencia1)";
        $sentencia3 = "SELECT MatriculaV FROM conduce WHERE CIC = ($sentencia2)";
        $datos = parent::obtenerDatos($sentencia3);
        if(isset($datos[0]['MatriculaV'])){//como el método que se llamo es un array, verifica si en la primera fila hay un valor
            return $datos[0]['MatriculaV'];
        }else{
            return 0;
        }
    }
    private function insertarToken($Mail){
        $val = true;//es necesario crear la variable porque la funcion no funciona con el true
        $token = bin2hex(openssl_random_pseudo_bytes(16,$val));
        //bin2hex es una función de php que devuleve un String hexadecimal
        //openssl_random_pseudo_bytes genera cadena de bytes aleatoria, necesita 2 parámetros, cantidad de bytes y booleano
        date_default_timezone_set("America/Montevideo");//cambia la fecha y hora por default
        $date = date("Y-m-d H:i");
        $estado = "Activo";
        $sentencia = "INSERT INTO personas_token (Mail, Token, Estado, Fecha)VALUES('$Mail','$token','$estado','$date')";
        $verificar = parent::guardar($sentencia);
        if($verificar){
            return $token;
        }else{
            return 0;
        }
    }
}
?>