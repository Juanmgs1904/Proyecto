<?php
require_once(realpath(dirname(__FILE__) . '/../conexion/conexion.php'));
class paquetes extends conexion
{

    private $codigo = "";
    private $peso = "";
    private $estado = "";
    private $fRecibo = "";
    private $fEntrega = "";
    private $Destinatario = "";
    private $Destino = "";
    public function listaPaquetes($idA)
    {
        if ($idA == 1) {
            $sentencia = "SELECT * FROM paquetes WHERE Estado = 'enCentral' OR Estado = 'loteAsignado'";
            $arrayDatos = parent::obtenerDatos($sentencia);
        } else {
            $sentencia1 = "SELECT lotes.IDL FROM lotes
              INNER JOIN contiene ON lotes.IDL = contiene.IDL
              WHERE lotes.idI = '$idA' AND lotes.Estado = 'Entregado'";

            $sentencia2 = "SELECT paquetes. * FROM paquetes
              INNER JOIN contiene ON paquetes.codigo = contiene.codigo
              WHERE contiene.IDL IN ($sentencia1)";

            $arrayDatos = parent::obtenerDatos($sentencia2);
        }
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
        if (!isset($datos['Estado']) ||  !isset($datos['fRecibo']) || !isset($datos['Peso']) ||  !isset($datos['Destinatario']) || !isset($datos['Destino'])) {
            return $_respuestas->error_400();
        } else {
            $this->estado = $datos['Estado'];
            $this->fRecibo = $datos['fRecibo'];
            $this->peso = $datos['Peso'];
            $this->Destinatario = $datos['Destinatario'];
            $this->Destino = $datos['Destino'];
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
        $sentencia = "INSERT INTO paquetes(Peso,Estado,fRecibo,fEntrega,Destinatario,Destino)
        VALUES
        ('" . $this->peso . "','" . $this->estado . "','" . $this->fRecibo . "','" . $this->fEntrega . "','" . $this->Destinatario . "','" . $this->Destino . "')";
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
        if (!isset($datos['codigo']) || !isset($datos['Estado']) || !isset($datos['fRecibo']) || !isset($datos['Peso']) || !isset($datos['Destinatario']) || !isset($datos['Destino'])) {
            return $_respuestas->error_400();
        } else {
            $this->codigo = $datos['codigo'];
            $this->estado = $datos['Estado'];
            $this->fRecibo = $datos['fRecibo'];
            $this->peso = $datos['Peso'];
            $this->Destinatario = $datos['Destinatario'];
            $this->Destino = $datos['Destino'];
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
        $sentencia = "UPDATE paquetes SET Peso = '" . $this->peso . "', Estado = '" . $this->estado . "',
        fRecibo = '" . $this->fRecibo . "', fEntrega = '" . $this->fEntrega . "',
        Destinatario = '" . $this->Destinatario . "', Destino = '" . $this->Destino . "'WHERE codigo = '" . $this->codigo . "'";
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
