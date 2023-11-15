<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/recorrido.php";

$_respuestas = new respuestas;
$_recorrido = new recorrido;

header('Content-Type: application/json'); //indica que va a devolver un json

switch ($_SERVER['REQUEST_METHOD']) {

        //Añadir
    case 'POST':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_recorrido->post($datosPost);

        require('../../Routes/R_almacen.php');
        break;

        //Mostrar
    case 'GET':
        if (isset($_GET['mostrar'])) {
            //solicita datos al modelo
            $respuesta = $_recorrido->mostrarRecorrido();
        } else {
            //solicita datos al modelo
            $respuesta = $_recorrido->listaHoras();
        }
        require('../../Routes/R_almacen.php');
        break;


        //Eliminar
    case 'DELETE':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_recorrido->delete($datosPost);

        require('../../Routes/R_almacen.php');

        break;

    default:
        require('../../Routes/R_almacen.php');
        break;
}
