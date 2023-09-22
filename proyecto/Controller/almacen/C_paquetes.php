<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/paquetes.php";

$_respuestas = new respuestas;
$_paquetes = new paquetes;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Añadir
    case 'POST':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_paquetes->post($datosPost);

        require ('../../Routes/R_almacen.php');
    break;

    //Mostrar
    case 'GET':
        if(isset($_GET['id'])){
            //solicita datos al modelo
            $respuesta = $_paquetes->mostrarPaquete($_GET['id']);
            require('../../Routes/R_almacen.php');
        }else{
            if(isset($_GET['idA'])){
                //solicita datos al modelo
                $respuesta = $_paquetes->listaPaquetes($_GET['idA']);
            }
            require('../../Routes/R_almacen.php');
        }
    break;

    //Modificar
    case 'PUT':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_paquetes->put($datosPost);

        require ('../../Routes/R_almacen.php');
    break;

    //Eliminar
    case 'DELETE':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_paquetes->delete($datosPost);

        require ('../../Routes/R_almacen.php');
    break;

    default:
        require ('../../Routes/R_almacen.php');
    break;
}
?>