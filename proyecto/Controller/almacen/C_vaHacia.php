<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/vaHacia.php";

$_respuestas = new respuestas;
$_vaHacia = new vaHacia;

header('Content-Type: application/json'); //indica que va a devolver un json

switch ($_SERVER['REQUEST_METHOD']) {

        //Añadir
    case 'POST':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_vaHacia->post($datosPost);

        require('../../Routes/R_almacen.php');
        break;

        //Mostrar
    case 'GET':
        if (isset($_GET['lotes'])) {
            //solicita datos al modelo
            $respuesta = $_vaHacia->listaLotesSA();
        } else {
            //solicita datos al modelo
            $respuesta = $_vaHacia->listaLotesR();
        }
        require('../../Routes/R_almacen.php');
        break;

        //Eliminar
    case 'DELETE':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_vaHacia->delete($datosPost);

        require('../../Routes/R_almacen.php');

        break;

    default:
        require('../../Routes/R_almacen.php');
        break;
}
