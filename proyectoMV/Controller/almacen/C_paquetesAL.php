<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/paquetesAL.php";

$_respuestas = new respuestas;
$_paquetesAL = new paquetesAL;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            //solicita datos al modelo
            $respuesta = $_paquetesAL->listaPaquetesAL();

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>