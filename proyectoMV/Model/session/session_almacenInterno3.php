<?php

session_start();

if(isset($_GET['lang'])){
    $_SESSION['selectedLanguage'] = $_GET['lang'];
}


$varsesion = $_SESSION['mail'];


$app = $_SESSION['rol'];

if ($varsesion == null || $varsesion == '') {
    header("Location: ../../../../Views/login/login.php");
    die();
}

if ($app == "AlmacenExterno") {
    header("Location: ../../indexExterno.php");
    die();
}

if ($app != "AlmacenInterno") {
    header("Location: ../../../../Views/login/login.php");
    die();
}


?>