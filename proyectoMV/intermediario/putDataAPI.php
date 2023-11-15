<?php
$ch = curl_init();
//lote
if (isset($_POST['id']) && isset($_POST['peso']) && isset($_POST['estado']) && isset($_POST['destino']) && isset($_POST['tiempoEstimado'])) {
    $id = $_POST['id'];
    $peso = $_POST['peso'];
    $estado = $_POST['estado'];
    $Destino = $_POST['destino'];
    $tiempoEstimado = $_POST['tiempoEstimado'];
    $idA = $_POST['idA'];

    $datos = [
        'idL' => $id,
        'peso' => $peso,
        'estado' => $estado,
        'destino' => $Destino,
        'tiempoEstimado' => $tiempoEstimado
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_lotes.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/lotes/lote.php?id=$id&idA=$idA");
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
        'Destino' => $Destino,

    ];
    $json = json_encode($datosP);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_paquetes.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/paquete/paquete.php?codigo=$codigo&idA=$idA");
    }
}
if (isset($_POST['codigo']) && isset($_POST['peso']) && isset($_POST['fRecibo']) && isset($_POST['fEntrega']) && isset($_POST['destinatario']) && isset($_POST['destino']) && isset($_POST['Estado'])) {
    $codigo = $_POST['codigo'];
    $peso = $_POST['peso'];
    $estado = $_POST['Estado'];
    $fRecibo = $_POST['fRecibo'];
    $fEntrega = $_POST['fEntrega'];
    $Destinatario = $_POST['destinatario'];
    $Destino = $_POST['destino'];
    $departamento = $_POST['departamento'];
    $empresa = $_GET['empresa'];
    $datosP = [
        'codigo' => $codigo,
        'Peso' => $peso,
        'Estado' => $estado,
        'fRecibo' => $fRecibo,
        'fEntrega' => $fEntrega,
        'Destinatario' => $Destinatario,
        'Destino' => $Destino,
        'Departamento' => $departamento,
        'Empresa' => $empresa
    ];
    $json = json_encode($datosP);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_paquetesE.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/paquete/paqueteE.php?codigo=$codigo&empresa=$empresa");
    }
}
/* Modificar paquetes a entregados */
if (isset($_POST['codigoE'])) {
    $codigo = $_POST['codigoE'];
    $matricula = $_GET['matricula'];
    $datos = [
        'codigo' => $codigo,
        'matricula' => $matricula
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/transito/C_paquetesE.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_camionero/entrega.php?matricula=$matricula");
    }
}

/* Modificar lotes a entregados */
if (isset($_POST['IDLE'])) {
    $IDL = $_POST['IDLE'];
    $matricula = $_GET['matricula'];
    $datos = [
        'IDL' => $IDL
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/transito/C_lotesE.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_camionero/lotesC.php?matricula=$matricula");
    }
}
//Modificar motivo de demora de camioneta
if(isset($_POST['motivo'])){
    $matricula = $_GET['matricula'];
    if($_POST['motivo'] != null){
        $motivo = $_POST['motivo'];
    
        $datos = [
            'demora' => $motivo,
            'matricula' => $matricula
        ];
    
        $json = json_encode($datos);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch,CURLOPT_URL,"localhost/Controller/transito/C_conduce.php");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        if(curl_errno($ch)){
            echo curl_error($ch);
        }else{
           header("location: ../Views/app_camionero/demoraCamioneta.php?matricula=$matricula");
        }   
    }else{
        header("location: ../Views/app_camionero/demoraCamioneta.php?matricula=$matricula");
    }
}

//Modificar motivo de demora de camion
if(isset($_POST['motivoC'])){
    $matricula = $_GET['matricula'];
    if($_POST['motivoC'] != null){
        $motivo = $_POST['motivoC'];
    
        $datos = [
            'demora' => $motivo,
            'matricula' => $matricula
        ];
    
        $json = json_encode($datos);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch,CURLOPT_URL,"localhost/Controller/transito/C_conduce.php");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        if(curl_errno($ch)){
            echo curl_error($ch);
        }else{
           header("location: ../Views/app_camionero/demoraCamion.php?matricula=$matricula");
        }   
    }else{
        header("location: ../Views/app_camionero/demoraCamion.php?matricula=$matricula");
    }   
}

//Modificar distancia en esta
if(isset($_POST['IDA']) && isset($_POST['IDR']) && isset($_POST['distancia'])){
    $IDA = $_POST['IDA'];
    $IDR = $_POST['IDR'];
    $distancia = $_POST['distancia'];
    $idA = $_GET['idA'];
    $mostrar = $_GET['mostrar'];

    $datos = [
        'IDR' => $IDR,
        'IDA' => $IDA,
        'distancia' => $distancia
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_esta.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/recorrido/almacenes.php?IDR=$IDR&idA=$idA&mostrar=$mostrar");
    }   
}

//Modificar disponibilidad de camión
if(isset($_GET['matricula']) && isset($_GET['disponibilidad'])){
    $matricula = $_GET['matricula'];
    $disponibilidad = $_GET['disponibilidad'];
    $idA = $_GET['idA'];

    $datos = [
        'Matricula' => $matricula,
        'Disponibilidad' => $disponibilidad
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_camiones.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/camionDisponibilidad.php?idA=$idA");
    }   
}

curl_close($ch);
