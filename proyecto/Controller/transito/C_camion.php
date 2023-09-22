<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/camion.php";

$_respuestas = new respuestas;
$_camion = new camion;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            //solicita datos al modelo
            $respuesta = $_camion->listaCamiones();

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>