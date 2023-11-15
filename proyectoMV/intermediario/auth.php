<?php
session_start();

$_SESSION['mail'] = $_POST['mail'];


$mail = $_POST['mail'];
$contraseña = $_POST['contraseña'];
$datos = array(
    "mail" => $mail,
    "contraseña" => $contraseña
);
$json = json_encode($datos);
require('../Controller/C_auth.php');
