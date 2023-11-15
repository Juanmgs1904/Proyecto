<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/paquetes.php";

$_respuestas = new respuestas;
$_paquetes = new paquetes;

header('Content-Type: application/json'); //indica que va a devolver un json

switch ($_SERVER['REQUEST_METHOD']) {

        //Mostrar
    case 'GET':
        if (isset($_GET['codigo'])) {
            $codigo = $_GET['codigo'];
            //solicita datos al modelo
            $respuesta = $_paquetes->mostrarPaquete($codigo);
        } else {
            //solicita datos al modelo
            $respuesta = $_paquetes->listaPaquetes();
        }
        require('../../Routes/R_almacen.php');
        break;
    case 'PUT':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_paquetes->put($datosPost);

        require('../../Routes/R_almacen.php');
        break;
    default:
        require('../../Routes/R_almacen.php');
        break;
}
