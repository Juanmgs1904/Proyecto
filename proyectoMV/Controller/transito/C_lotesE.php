<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/lotesE.php";

$_respuestas = new respuestas;
$_lotesE = new lotesE;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){
    case 'PUT':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_lotesE->put($datosPost);

        require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>