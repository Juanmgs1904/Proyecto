<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/lotesE.php";

$_respuestas = new respuestas;
$_lotes = new lotesE;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Añadir
    case 'POST':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_lotes->post($datosPost);

        require('../../Routes/R_almacen.php');
    break;

    //Mostrar
    case 'GET':
        $empresa = $_GET['empresa'];
        //solicita datos al modelo
        $respuesta = $_lotes->listaLotesE($empresa);
            
        require('../../Routes/R_almacen.php');
    break;
    //Eliminar
    case 'DELETE':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_lotes->delete($datosPost);

        require('../../Routes/R_almacen.php');

    break;

    default:
        require('../../Routes/R_almacen.php');
    break;
}
