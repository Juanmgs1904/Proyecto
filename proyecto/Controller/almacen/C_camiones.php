<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/camiones.php";

$_respuestas = new respuestas;
$_camiones = new camiones;

header('Content-Type: application/json'); //indica que va a devolver un json

switch ($_SERVER['REQUEST_METHOD']) {

        //Mostrar
    case 'GET':
        if (isset($_GET['ruta'])) { //si llega el valor por GET
            $ruta = $_GET['ruta'];
            if ($ruta == true) {
                //solicita datos al modelo
                $respuesta = $_camiones->camionesRuta();
            } else {
                if (isset($_GET['externo'])) {
                    $externo = $_GET['externo'];
                    if ($externo == true) {
                        //solicita datos al modelo
                        $respuesta = $_camiones->camionesExterno();
                    } else {
                        //solicita datos al modelo
                        $respuesta = $_camiones->camionesInterno();
                    }
                } else {
                    //solicita datos al modelo
                    $respuesta = $_camiones->camionesDisponibles();
                }
            }
        } else {
            //solicita datos al modelo
            $respuesta = $_camiones->listaCamiones();
        }
        require('../../Routes/R_almacen.php');
        break;
        //Modificar
    case 'PUT':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_camiones->put($datosPost);

        require('../../Routes/R_almacen.php');
        break;
    default:
        require('../../Routes/R_almacen.php');
        break;
}
