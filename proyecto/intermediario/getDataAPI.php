<?php
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($ch);
if(curl_errno($ch)){
    echo curl_error($ch);
}else{
    $array = json_decode($respuesta, true);
}
curl_close($ch);
?>