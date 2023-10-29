<?php
$idA = $_GET['idA'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto/controller/almacen/C_recorrido.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
if (curl_errno($ch)) {
    echo curl_error($ch);
} else {
    header("location:  http://localhost/proyecto/Views/app_almacen/recorrido/recorrido.php?idA=$idA");
}
curl_close($ch);