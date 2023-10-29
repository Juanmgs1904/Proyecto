<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/asignarLote.php";

$_respuestas = new respuestas;
$_asignarLote = new asignarLote;

header('Content-Type: application/json'); //indica que va a devolver un json

switch ($_SERVER['REQUEST_METHOD']) {

        //Añadir
    case 'POST':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_asignarLote->post($datosPost);

        require('../../Routes/R_almacen.php');
        break;

        //Mostrar
    case 'GET':
        if (isset($_GET['matricula'])) {
            $matricula = $_GET['matricula'];
            //solicita datos al modelo
            $respuesta = $_asignarLote->lotesDelCamion($matricula);
        } else {
            if (isset($_GET['empresa'])) {
                //solicita datos al modelo
                $respuesta = $_asignarLote->listaLACE();
            } else {
                //solicita datos al modelo
                $respuesta = $_asignarLote->listaLAC();
            }
        }
        require('../../Routes/R_almacen.php');
        break;

        //Modificar
    case 'PUT':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_asignarLote->put($datosPost);

        require('../../Routes/R_almacen.php');
        break;

        //Eliminar
    case 'DELETE':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_asignarLote->delete($datosPost);

        require('../../Routes/R_almacen.php');

        break;

    default:
        require('../../Routes/R_almacen.php');
        break;
}
