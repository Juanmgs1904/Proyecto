<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/transporta.php";

$_respuestas = new respuestas;
$_transporta = new transporta;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $idA = $_GET['idA'];
            //solicita datos al modelo
            $respuesta = $_transporta->camionetasTransporta($idA);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>