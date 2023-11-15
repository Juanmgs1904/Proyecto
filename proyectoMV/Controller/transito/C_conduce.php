<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/conduce.php";

$_respuestas = new respuestas;
$_conduce = new conduce;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Añadir
    case 'PUT':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_conduce->put($datosPost);

        require('../../Routes/R_almacen.php');
    break;
    default:
        require('../../Routes/R_almacen.php');
    break;
}
?>