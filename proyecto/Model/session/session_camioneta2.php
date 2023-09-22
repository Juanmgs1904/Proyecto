<?php

session_start();

$varsesion = $_SESSION['mail'];


$app = $_SESSION['rol'];

if ($varsesion == null || $varsesion == '') {
    header("Location: ../../../Views/login/login.php");
    die();
}

if ($app == "ChoferCamion") {
    header("Location: ../indexCamion.php");
    die();
}

if ($app != "ChoferCamioneta") {
    header("Location: ../../../Views/login/login.php");
    die();
}


?>