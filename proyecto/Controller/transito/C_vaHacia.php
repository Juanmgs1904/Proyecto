<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/vaHacia.php";

$_respuestas = new respuestas;
$_vaHacia = new vaHacia;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $matricula = $_GET['matricula'];
            //solicita datos al modelo
            $respuesta = $_vaHacia->infoRecorrido($matricula);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>