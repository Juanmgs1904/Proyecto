<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/lotesP.php";

$_respuestas = new respuestas;
$_lotesP = new lotesP;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $codigo = $_GET['codigo'];
            //solicita datos al modelo
            $respuesta = $_lotesP->listalotesP($codigo);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>