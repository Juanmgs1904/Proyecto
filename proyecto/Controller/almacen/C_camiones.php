<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/camiones.php";

$_respuestas = new respuestas;
$_camiones = new camiones;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            //solicita datos al modelo
            $respuesta = $_camiones->listaCamiones();

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>