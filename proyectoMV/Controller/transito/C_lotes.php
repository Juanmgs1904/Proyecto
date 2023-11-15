<?php
require_once "../../Model/respuestas.class.php";
require_once "../../Model/almacen/lotes.php";

$_respuestas = new respuestas;
$_lotes = new lotes;

header('Content-Type: application/json');//indica que va a devolver un json

switch($_SERVER['REQUEST_METHOD']){

    //Mostrar
    case 'GET':
        if(isset($_GET['id'])){
            //solicita datos al modelo
            $respuesta = $_lotes->mostrarLote($_GET['id']);

            require('../../Routes/R_almacen.php');
        }else{
            if(isset($_GET['idA'])){
                //solicita datos al modelo
                $respuesta = $_lotes->listaLotes($_GET['idA']);
    
                require('../../Routes/R_almacen.php');
            }else{
                require('../../Routes/R_almacen.php');
            }
        }
    break;

    //Modificar
    case 'PUT':
        //recibir datos
        $datosPost = file_get_contents('php://input');

        //solicita datos al modelo
        $datosArray = $_lotes->put($datosPost);

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
?>