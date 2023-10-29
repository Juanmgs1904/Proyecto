<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/lotesAPE.php";

$_respuestas = new respuestas;
$_lotesAPE = new lotesAPE;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $empresa = $_GET['empresa'];
            //solicita datos al modelo
            $respuesta = $_lotesAPE->listaLotesAP($empresa);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>