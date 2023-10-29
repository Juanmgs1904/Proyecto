<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/camionP.php";

$_respuestas = new respuestas;
$_camionP = new camionP;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $IDL = $_GET['IDL'];
            //solicita datos al modelo
            $respuesta = $_camionP->listaCamiones($IDL);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>