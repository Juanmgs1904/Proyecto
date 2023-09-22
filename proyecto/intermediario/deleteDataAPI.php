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
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_lotes.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/lotes/lotes.php?id=1");
    }
}
if(isset($_GET['idE'])){
    $id = $_GET['idE'];

    $datos = [
        'idL' => $id
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_lotesE.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/lotes/lotesE.php");
    }
}


//paquete a camioneta
if(isset($_GET['codigoC'])){
    $codigo = $_GET['codigoC'];

    $datos = [
        'codigo' => $codigo
    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_asignarPAC.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/tabla_asignarPAC.php");
    }
}

//lote a camion
if(isset($_GET['IDL']) && isset($_GET['matricula'])){
    $IDL = $_GET['IDL'];
    $matricula = $_GET['matricula'];

    $datos = [
        'IDL' => $IDL
    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_asignarLote.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/lotesAC.php?matricula=$matricula");
    }
}

//paquete a lote
if(isset($_GET['codigoL'])){
    $codigo = $_GET['codigoL'];
    $IDL = $_GET['IDL'];

    $datos = [
        'codigo' => $codigo
    ];
    
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_asignarPAL.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/paquetesAL.php?IDL=$IDL");
    }
}


//paquete
if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];

    $datos = [
        'codigo' => $codigo
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_paquetes.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/paquete/paquetes.php");
    }
}
if(isset($_GET['codigoE'])){
    $codigo = $_GET['codigoE'];

    $datos = [
        'codigo' => $codigo
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_paquetesE.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/paquete/paquetesE.php");
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
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_llegada.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/tabla_llegada.php");
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
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_salida.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/tabla_salida.php");
    }
}

//va llegada camioneta
if(isset($_GET['matriculaC']) && isset($_GET['fechaLlegada'])){
    $matriculaC = $_GET['matriculaC'];
    $FechaLlegada = $_GET['fechaLlegada'];

    $datos = [
        'matriculaC' => $matriculaC,
        'fechaLlegada' => $FechaLlegada
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_llegadaCam.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/tabla_llegadaCam.php");
    }
}


//va salida camioneta
if(isset($_GET['matriculaSC']) && isset($_GET['fechaSalida'])){
    $matriculaC = $_GET['matriculaSC'];
    $fechaSalida = $_GET['fechaSalida'];

    $datos = [
        'matriculaC' => $matriculaC,
        'fechaSalida' => $fechaSalida
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_salidaCam.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/tabla_salidaCam.php");
    }
}


//rutas
if(isset($_GET['IDR']) && isset($_GET['nroRuta'])){
    $IDR = $_GET['IDR'];
    $nroRuta = $_GET['nroRuta'];

    $datos = [
        'IDR' => $IDR,
        'nroRuta' => $nroRuta
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_nrorecorrido.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/recorrido/rutas.php?IDR=$IDR");
    }
}



//esta
if(isset($_GET['IDR']) && isset($_GET['IDA'])){
    $IDR = $_GET['IDR'];
    $IDA = $_GET['IDA'];

    $datos = [
        'IDR' => $IDR,
        'IDA' => $IDA
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_esta.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/recorrido/recorrido.php");
    }
}

//sigue
if(isset($_GET['MatriculaSig']) && isset($_GET['IDR'])){
    $MatriculaSig = $_GET['MatriculaSig'];
    $IDR = $_GET['IDR'];

    $datos = [
        'Matricula' => $MatriculaSig
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_sigue.php");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/tablas/camionesR.php?IDR=$IDR");
    }
}




curl_close($ch);
