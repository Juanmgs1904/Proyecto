<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/choferP.php";

$_respuestas = new respuestas;
$_choferP = new choferP;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $matricula = $_GET['Matricula'];
            //solicita datos al modelo
            $respuesta = $_choferP->listaChoferes($matricula);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>