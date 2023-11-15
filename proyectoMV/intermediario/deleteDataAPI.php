<?php
$ch = curl_init();
//lotes
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $datos = [
        'idL' => $id
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_lotes.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/lotes/lotes.php?idA=1");
    }
}
if(isset($_GET['idE'])){
    $id = $_GET['idE'];
    $empresa = $_GET['empresa'];

    $datos = [
        'idL' => $id
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_lotesE.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/lotes/lotesE.php?empresa=$empresa");
    }
}


//paquete a camioneta
if(isset($_GET['codigoC'])){
    $codigo = $_GET['codigoC'];
    $idA = $_GET['idA'];
    $matricula = $_GET['matricula'];

    $datos = [
        'codigo' => $codigo
    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_asignarPAC.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/paquetesAC.php?idA=$idA&matriculaC=$matricula");
    }
}

//lote a camion
if(isset($_GET['IDL']) && isset($_GET['matricula'])){
    $IDL = $_GET['IDL'];
    $matricula = $_GET['matricula'];
    $idA = $_GET['idA'];

    $datos = [
        'IDL' => $IDL
    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_asignarLote.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/lotesAC.php?matricula=$matricula&idA=$idA");
    }
}
if(isset($_GET['IDLE']) && isset($_GET['matriculaE'])){
    $IDL = $_GET['IDLE'];
    $matricula = $_GET['matriculaE'];
    $empresa = $_GET['empresa'];

    $datos = [
        'IDL' => $IDL
    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_asignarLote.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/lotesACE.php?matricula=$matricula&empresa=$empresa");
    }
}

//paquete a lote
if(isset($_GET['codigoL'])){
    $codigo = $_GET['codigoL'];
    $IDL = $_GET['IDL'];
    $idA = $_GET['idA'];

    $datos = [
        'codigo' => $codigo,
        'IDL' => $IDL
    ];
    
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_asignarPAL.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/paquetesAL.php?IDL=$IDL&idA=$idA");
    }
}
if(isset($_GET['codigoLE'])){
    $codigo = $_GET['codigoLE'];
    $IDL = $_GET['IDL'];
    $empresa = $_GET['empresa'];

    $datos = [
        'codigo' => $codigo
    ];
    
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_asignarPALE.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/paquetesALE.php?IDL=$IDL&empresa=$empresa");
    }
}


//paquete
if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
    $idA = $_GET['idA'];

    $datos = [
        'codigo' => $codigo
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_paquetes.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/paquete/paquetes.php?idA=$idA");
    }
}
if(isset($_GET['codigoE'])){
    $codigo = $_GET['codigoE'];
    $empresa = $_GET['empresa'];

    $datos = [
        'codigo' => $codigo
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_paquetesE.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/paquete/paquetesE.php?empresa=$empresa");
    }
}

//va a llegada
if(isset($_GET['matricula']) && isset($_GET['IDA']) && isset($_GET['fechaLlegada'])){
    $matricula = $_GET['matricula'];
    $IDA = $_GET['IDA'];
    $fechaLlegada = $_GET['fechaLlegada'];

    $datos = [
        'matricula' => $matricula,
        'idA' => $IDA,
        'fechaLlegada' => $fechaLlegada
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_llegada.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/tabla_llegada.php?idA=$IDA");
    }
}

//va a salida
if(isset($_GET['matriculaS'])  && isset($_GET['IDA']) && isset($_GET['fechaSalida'])){
    $matricula = $_GET['matriculaS'];
    $IDA = $_GET['IDA'];
    $fechaSalida = $_GET['fechaSalida'];

    $datos = [
        'matricula' => $matricula,
        'idA' => $IDA,
        'fechaSalida' => $fechaSalida
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_salida.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/tabla_salida.php?idA=$IDA");
    }
}

//va llegada camioneta
if(isset($_GET['matriculaC']) && isset($_GET['fechaLlegada'])){
    $matriculaC = $_GET['matriculaC'];
    $FechaLlegada = $_GET['fechaLlegada'];
    $idA = $_GET['idA'];

    $datos = [
        'matriculaC' => $matriculaC,
        'fechaLlegada' => $FechaLlegada
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_llegadaCam.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/tabla_llegadaCam.php?idA=$idA");
    }
}


//va salida camioneta
if(isset($_GET['matriculaSC']) && isset($_GET['fechaSalida'])){
    $matriculaC = $_GET['matriculaSC'];
    $fechaSalida = $_GET['fechaSalida'];
    $idA = $_GET['idA'];

    $datos = [
        'matriculaC' => $matriculaC,
        'fechaSalida' => $fechaSalida
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_salidaCam.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/almacen/tablas/tabla_salidaCam.php?idA=$idA");
    }
}

//recorrido
if(isset($_GET['IDR'])){
    $IDR = $_GET['IDR'];
    $idA = $_GET['idA'];

    $datos = [
        'IDR' => $IDR
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_recorrido.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/recorrido/recorrido.php?idA=$idA");
    }
}

//esta
if(isset($_GET['IDRA']) && isset($_GET['IDA'])){
    $IDR = $_GET['IDRA'];
    $IDA = $_GET['IDA'];
    $idA = $_GET['idA'];
    $mostrar = $_GET['mostrar'];

    $datos = [
        'IDR' => $IDR,
        'IDA' => $IDA
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_esta.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/recorrido/almacenes.php?idA=$idA&IDR=$IDR&mostrar=$mostrar");
    }
}


//va_hacia
if(isset($_GET['IDLAR'])){
    $IDL = $_GET['IDLAR'];

    $datos = [
        'IDL' => $IDL
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"localhost/Controller/almacen/C_vaHacia.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: ../Views/app_almacen/lotes/tabla_asignarLAR.php");
    }
}

curl_close($ch);
