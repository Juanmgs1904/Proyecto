<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetesE extends conexion
{

    private $codigo = "";
    private $peso = "";
    private $estado = "";
    private $fRecibo = "";
    private $fEntrega = "";
    private $Destinatario = "";
    private $Destino = "";
    private $empresa = "";
    private $Departamento = "";
    public function listaPaquetes($empresa)
    {
        $sentencia = "SELECT paquetes.* FROM paquetes 
        WHERE paquetes.Estado = 'enAlmacenExterno' OR paquetes.Estado = 'loteExternoAsignado' 
        AND paquetes.Empresa = '$empresa' AND codigo IN (SELECT paquetes.codigo FROM paquetes
        JOIN contiene ON paquetes.codigo = contiene.codigo JOIN lotes ON contiene.IDL = lotes.IDL 
        WHERE lotes.Estado = 'noAsignado')";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }

    public function mostrarPaquete($id)
    {
        $sentencia = "SELECT * FROM paquetes WHERE codigo = '$id'";
        $arrayDatos = parent::obtenerDatos($sentencia);
        return $arrayDatos;
    }
    public function post($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['Estado']) || !isset($datos['Peso']) ||  !isset($datos['Destinatario']) || !isset($datos['Destino']) || !isset($datos['Departamento']) || !isset($datos['Empresa'])) {
            return $_respuestas->error_400();
        } else {
            $this->estado = $datos['Estado'];
            $this->peso = $datos['Peso'];
            $this->Destinatario = $datos['Destinatario'];
            $this->Destino = $datos['Destino'];
            $this->Departamento = $datos['Departamento'];
            $this->empresa = $datos['Empresa'];
            if (isset($datos['fEntrega'])) {
                $this->fEntrega = $datos['fEntrega'];
            }
            $respuestaId = $this->altaPaquete();
            if ($respuestaId) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se añadió el paquete con código" => $respuestaId
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    }
    private function altaPaquete()
    {
        $sentencia = "INSERT INTO paquetes(Peso,Estado,fEntrega,Destinatario,Destino,Departamento,Empresa)
        VALUES
        ('" . $this->peso . "','" . $this->estado . "','" . $this->fEntrega . "','" . $this->Destinatario . "','" . $this->Destino . "','" . $this->Departamento . "','" . $this->empresa . "')";
        $respuesta = parent::guardarId($sentencia);
        if ($respuesta) {
            return $respuesta;
        } else {
            return 0;
        }
    }

    public function put($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['codigo']) || !isset($datos['Estado']) || !isset($datos['Peso']) || !isset($datos['Destinatario']) || !isset($datos['Destino']) || !isset($datos['Departamento']) || !isset($datos['Empresa'])) {
            return $_respuestas->error_400();
        } else {
            $this->codigo = $datos['codigo'];
            $this->estado = $datos['Estado'];
            $this->peso = $datos['Peso'];
            $this->Destinatario = $datos['Destinatario'];
            $this->Destino = $datos['Destino'];
            $this->Departamento = $datos['Departamento'];
            $this->empresa = $datos['Empresa'];
            if (isset($datos['fEntrega'])) {
                $this->fEntrega = $datos['fEntrega'];
            }
            $respuestaFilas = $this->modificarPaquete();
            if ($respuestaFilas) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se modificó el paquete con código" => $this->codigo
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    }
    private function modificarPaquete()
    {
        $sentencia = "UPDATE paquetes SET Peso = '" . $this->peso . "', Estado = '" . $this->estado . "', fEntrega = '" . $this->fEntrega . "',
        Destinatario = '" . $this->Destinatario . "', Destino = '" . $this->Destino . "', Departamento = '" . $this->Departamento . "', Empresa = '" . $this->empresa . "'WHERE codigo = '" . $this->codigo . "'";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta >= 1) {
            return $respuesta;
        } else {
            return 0;
        }
    }

    public function delete($json)
    {
        $_respuestas = new respuestas;
        $datos = json_decode($json, true);
        if (!isset($datos['codigo'])) {
            return $_respuestas->error_400();
        } else {
            $this->codigo = $datos['codigo'];
            $respuestaFilas = $this->eliminarPaquete();
            if ($respuestaFilas) {
                $respuesta = $_respuestas->respuesta;
                $respuesta['resultado'] = array(
                    "Se eliminó el paquete con código" => $this->codigo
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    }
    private function eliminarPaquete()
    {
        $sentencia = "DELETE FROM paquetes WHERE codigo = '" . $this->codigo . "'";
        $respuesta = parent::guardar($sentencia);
        if ($respuesta >= 1) {
            return $respuesta;
        } else {
            return 0;
        }
    }
}
