<?php

session_start();
$varsesion = $_SESSION['mail'];

$app = $_SESSION['rol'];

if ($varsesion==null || $varsesion=='') {
    header("Location: ../../Views/login/login.php");
    die();
    
}

if ($app != "Administrador") {
    header("Location: ../../Views/login/login.php"); // Redirige si no es un administrador
    die();
}


?>