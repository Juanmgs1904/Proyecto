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
        header("location: http://localhost/proyecto/Views/login/login.php?mensaje=$responseMsg");
    }
    if ($app) {
        session_start();
        $_SESSION['rol'] = $app;
        if ($app == "AlmacenInterno") {
            header("location: http://localhost/proyecto/Views/app_almacen/index.php");
        } else {
            if ($app == "AlmacenExterno") {
                header("location: http://localhost/proyecto/Views/app_almacen/indexExterno.php");
            } else {
                if ($app == "Administrador") {
                    header("location: http://localhost/proyecto/Views/backoffice/index.php");
                } else {
                    if ($app == "ChoferCamion") {
                        header("location: http://localhost/proyecto/Views/app_camionero/indexCamion.php");
                    } else {
                        if ($app == "ChoferCamioneta") {
                            header("location: http://localhost/proyecto/Views/app_camionero/indexCamioneta.php");
                        }
                    }
                }
            }
        }
    }
} else {
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
    $responseCode = $datosArray["resultado"]["error_id"];
    http_response_code($responseCode);
}
