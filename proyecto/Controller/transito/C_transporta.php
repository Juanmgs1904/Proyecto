<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/transporta.php";

$_respuestas = new respuestas;
$_transporta = new transporta;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $matricula = $_GET['matricula'];
            //solicita datos al modelo
            $respuesta = $_transporta->listaPaquetes($matricula);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>