<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/nrorecorrido.php";

$_respuestas = new respuestas;
$_nrorecorrido = new nrorecorrido;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Añadir
    case 'POST':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_nrorecorrido->post($datosPost);

        require('../../Routes/R_almacen.php');
    break;

    //Mostrar
    case 'GET':
            //solicita datos al modelo
            $respuesta = $_nrorecorrido->listaHoras();

            require('../../Routes/R_almacen.php');
    break;

    //Eliminar
    case 'DELETE':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_nrorecorrido->delete($datosPost);

        require('../../Routes/R_almacen.php');

    break;

    default:
        require('../../Routes/R_almacen.php');
    break;
}
?>