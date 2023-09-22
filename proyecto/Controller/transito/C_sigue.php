<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/transito/sigue.php";

$_respuestas = new respuestas;
$_sigue = new sigue;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Añadir
    case 'POST':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_sigue->post($datosPost);

        require('../../Routes/R_almacen.php');
    break;

    //Mostrar
    case 'GET':
        if(isset($_GET['matricula'])){
            $matricula = $_GET['matricula'];
            //solicita datos al modelo
            $respuesta = $_sigue->listaRecorrido($matricula);
        }else{
            $respuesta = $_sigue->mostrarMatricula();
        }
            require('../../Routes/R_almacen.php');
    break;

    //Eliminar
    case 'DELETE':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_sigue->delete($datosPost);

        require('../../Routes/R_almacen.php');

    break;

    default:
        require('../../Routes/R_almacen.php');
    break;
}
?>