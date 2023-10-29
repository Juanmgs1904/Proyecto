<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/almacenE.php";

$_respuestas = new respuestas;
$_almacenE = new almacenE;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $IDR = $_GET['IDR'];
            //solicita datos al modelo
            $respuesta = $_almacenE->listaAlmacenesE($IDR);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>