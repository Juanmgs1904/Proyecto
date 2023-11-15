<?php
require_once "../Model/autenticacion.class.php";
require_once "../Model/respuestas.class.php";

$_autenticacion = new autenticacion;
$_respuestas = new respuestas;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //solicita datos al modelo
    $datosArray = $_autenticacion->login($json);
    require('../Routes/R_auth.php');
    if ($responseMsg) {
        header("location: ../Views/login/login.php?mensaje=$responseMsg");
    }
    if ($app) {
        $_SESSION['rol'] = $app;
        if ($app == "AlmacenInterno") {
            header("location: ../Views/app_almacen/index.php?idA=$idA");
        } else {
            if ($app == "AlmacenExterno") {
                header("location: ../Views/app_almacen/indexExterno.php?empresa=$empresa");
            } else {
                if ($app == "Administrador") {
                    header("location: ../Views/backoffice/index.php");
                } else {
                    if ($app == "ChoferCamion") {
                        header("location: ../Views/app_camionero/indexCamion.php?matricula=$matricula");
                    } else {
                        if ($app == "ChoferCamioneta") {
                            header("location: ../Views/app_camionero/indexCamioneta.php?matricula=$matricula");
                        }
                    }
                }
            }
        }
    }
} else {
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    json_encode($datosArray);
    $responseCode = $datosArray["resultado"]["error_id"];
    http_response_code($responseCode);
}
