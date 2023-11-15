<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/camionetasP.php";

$_respuestas = new respuestas;
$_camionetasP = new camionetasP;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
            $codigo = $_GET['codigo'];
            //solicita datos al modelo
            $respuesta = $_camionetasP->listaCamionetas($codigo);

            require('../../Routes/R_almacen.php');
    break;
    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>