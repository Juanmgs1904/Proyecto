<?php
$ch = curl_init();
//lote
if (isset($_POST['id']) && isset($_POST['peso']) && isset($_POST['estado']) && isset($_POST['destino']) && isset($_POST['ruta']) && isset($_POST['tiempoEstimado']) && isset($_POST['idI'])) {
    $id = $_POST['id'];
    $peso = $_POST['peso'];
    $estado = $_POST['estado'];
    $Destino = $_POST['destino'];
    $Ruta = $_POST['ruta'];
    $tiempoEstimado = $_POST['tiempoEstimado'];
    $idI = $_POST['idI'];
    $idA = $_POST['idA'];

    $datos = [
        'idL' => $id,
        'peso' => $peso,
        'estado' => $estado,
        'destino' => $Destino,
        'ruta' => $Ruta,
        'tiempoEstimado' => $tiempoEstimado,
        'idI' => $idI
    ];
    $json = json_encode($datos);
    echo $json;
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto/controller/almacen/C_lotes.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: http://localhost/proyecto/Views/app_almacen/lotes/lote.php?id=$id&idA=$idA");
    }
}

//paquete
if (isset($_POST['codigo']) && isset($_POST['peso']) && isset($_POST['estado']) && isset($_POST['fRecibo']) && isset($_POST['fEntrega']) && isset($_POST['destinatario']) && isset($_POST['destino'])) {
    $codigo = $_POST['codigo'];
    $peso = $_POST['peso'];
    $estado = $_POST['estado'];
    $fRecibo = $_POST['fRecibo'];
    $fEntrega = $_POST['fEntrega'];
    $Destinatario = $_POST['destinatario'];
    $Destino = $_POST['destino'];
    $idA = $_POST['idA'];
    $datosP = [
        'codigo' => $codigo,
        'Peso' => $peso,
        'Estado' => $estado,
        'fRecibo' => $fRecibo,
        'fEntrega' => $fEntrega,
        'Destinatario' => $Destinatario,
        'Destino' => $Destino
    ];
    $json = json_encode($datosP);
    echo $json;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto/controller/almacen/C_paquetes.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: http://localhost/proyecto/Views/app_almacen/paquete/paquete.php?codigo=$codigo&idA=$idA");
    }
}
if (isset($_POST['codigo']) && isset($_POST['peso']) && isset($_POST['fRecibo']) && isset($_POST['fEntrega']) && isset($_POST['destinatario']) && isset($_POST['destino'])) {
    $codigo = $_POST['codigo'];
    $peso = $_POST['peso'];
    $estado = "enAlmacenExterno";
    $fRecibo = $_POST['fRecibo'];
    $fEntrega = $_POST['fEntrega'];
    $Destinatario = $_POST['destinatario'];
    $Destino = $_POST['destino'];
    $idA = $_POST['idA'];
    $datosP = [
        'codigo' => $codigo,
        'Peso' => $peso,
        'Estado' => $estado,
        'fRecibo' => $fRecibo,
        'fEntrega' => $fEntrega,
        'Destinatario' => $Destinatario,
        'Destino' => $Destino
    ];
    $json = json_encode($datosP);
    echo $json;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto/controller/almacen/C_paquetesE.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: http://localhost/proyecto/Views/app_almacen/paquete/paqueteE.php?codigo=$codigo");
    }
}
/* Modificar paquetes a entregados */
if (isset($_POST['codigoE'])) {
    $codigo = $_POST['codigoE'];
    $datos = [
        'codigo' => $codigo
    ];
    $json = json_encode($datos);
    echo $json;
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto/controller/transito/C_paquetes.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: http://localhost/proyecto/Views/app_camionero/entrega.php");
    }
}

curl_close($ch);
