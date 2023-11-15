<?php

header('Content-Type: application/json');//indica que va a devolver un json
$responseMsg = null;

switch($_SERVER['REQUEST_METHOD']){

    //Añadir
    case 'POST':
        //enviar una respuesta
        if(isset($datosArray["resultado"]["error_id"])){//si en el array hay error_id
            $responseCode = $datosArray["resultado"]["error_id"];//guarda solo el número del error
            http_response_code($responseCode);//Establece el código de estado de la respuesta HTTP.
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
    break;

    //Mostrar
    case 'GET':
        echo json_encode($respuesta);
        http_response_code(200);
    break;

    //Modificar
    case 'PUT':
        //enviar una respuesta
        if(isset($datosArray["resultado"]["error_id"])){//si en el array hay error_id
            $responseCode = $datosArray["resultado"]["error_id"];//guarda solo el número del error
            http_response_code($responseCode);//Establece el código de estado de la respuesta HTTP.
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
    break;

    //Eliminar
    case 'DELETE':
        //enviar una respuesta
        if(isset($datosArray["resultado"]["error_id"])){//si en el array hay error_id
            $responseCode = $datosArray["resultado"]["error_id"];//guarda solo el número del error
            http_response_code($responseCode);//Establece el código de estado de la respuesta HTTP.
            $responseMsg = $datosArray["resultado"]["error_msg"];//guarda solo el mensaje del error
        }else{
            http_response_code(200);
            $responseMsg = $datosArray["resultado"];//guarda el mensaje
        }
        echo json_encode($datosArray);
    break;
    
    //Se mando otro método
    default:
        $datosArray = $_respuestas->error_405();
        echo json_encode($datosArray);
        $responseCode = $datosArray["resultado"]["error_id"];
        http_response_code($responseCode);
    break;
}
?>