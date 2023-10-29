<?php
//enviar una respuesta en json
    header('Content-Type: application/json');//Indica que tipo de contenido será retornado
    $responseMsg = null;
    $app = null;
    $idA = null;
    $empresa = null;
    $matricula = null;
    $token = null;
    if(isset($datosArray["resultado"]["error_id"])){//si en el array hay error_id
        $responseCode = $datosArray["resultado"]["error_id"];//guarda solo el número del error
        $responseMsg = $datosArray["resultado"]["error_msg"];//guarda solo el mensaje del error
        http_response_code($responseCode);//Establece el código de estado de la respuesta HTTP.
    }else{
        http_response_code(200);
        $app = $datosArray["resultado"]["aplicación"];//guarda solo la app
        $idA = $datosArray["resultado"]["idA"];//guarda solo el id del almacén
        $empresa = $datosArray["resultado"]["empresa"];//guarda solo la empresa
        $matricula = $datosArray["resultado"]["matricula"];//guarda solo la matrícula
        $token = $datosArray['resultado']['token'];//guarda solo el token
    }
    echo json_encode($datosArray);
?>