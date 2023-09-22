<?php
$ch = curl_init();
//Lote
if(isset($_POST['Destino']) && isset($_POST['Ruta']) && isset($_POST['tiempoEstimado'])){
    $Destino = $_POST['Destino'];
    $Ruta = $_POST['Ruta'];
    $tiempoEstimado = $_POST['tiempoEstimado'];
    $idI = $_POST['idI'];

    $datos = [
        'estado' => "No Asignado",
        'destino' => $Destino,
        'ruta' => $Ruta,
        'tiempoEstimado' => $tiempoEstimado,
        'idI' => $idI
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_lotes.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/lotes/lotes.php?id=1");
    }
}

//Paquete
if(isset($_POST['peso']) && isset($_POST['fRecibo']) && isset($_POST['fEntrega']) && isset($_POST['Destinatario']) && isset($_POST['Destino'])){
    $Peso = $_POST['peso'];
    $Estado = "NoAsignado";
    $fRecibo = $_POST['fRecibo'];
    $fEntrega = $_POST['fEntrega'];
    $Destinatario = $_POST['Destinatario'];
    $Destino = $_POST['Destino'];
    $idA = $_POST['idA'];

    $datos = [
        'Peso' => $Peso,
        'Estado' => $Estado,
        'fRecibo' => $fRecibo,
        'fEntrega' => $fEntrega,
        'Destinatario' => $Destinatario,
        'Destino' => $Destino
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_paquetes.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/paquete/paquetes.php?id=$idA");
    }
}


//Camion Alamcen
if(isset($_POST['Matricula']) && isset($_POST['idA'])){
    $Matricula = $_POST['Matricula'];
    $idA = $_POST['idA'];

    $datos = [
        'matricula' => $Matricula,
        'idA' => $idA
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_vaA.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
}


//Camioneta AlamcenInterno
if(isset($_POST['MatriculaC']) && isset($_POST['idI'])){
    $MatriculaC = $_POST['MatriculaC'];
    $idI = $_POST['idI'];

    $datos = [
        'matriculaC' => $MatriculaC,
        'idI' => $idI
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_va.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
}

//Camion llegada
if(isset($_POST['Matricula']) && isset($_POST['idA']) && isset($_POST['fechaLlegada'])){
    $Matricula = $_POST['Matricula'];
    $idA = $_POST['idA'];
    $fechaLlegada = $_POST['fechaLlegada'];

    $datos = [
        'matricula' => $Matricula,
        'idA' => $idA,
        'fechaLlegada' => $fechaLlegada
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_llegada.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
}

//Camion salida
if(isset($_POST['Matricula']) && isset($_POST['idA']) && isset($_POST['fechaSalida'])){
    $Matricula = $_POST['Matricula'];
    $idA = $_POST['idA'];
    $fechaSalida = $_POST['fechaSalida'];

    $datos = [
        'matricula' => $Matricula,
        'idA' => $idA,
        'fechaSalida' => $fechaSalida
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_salida.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
}

//Camion 
if(isset($_POST['MatriculaC']) && isset($_POST['idI']) && isset($_POST['fechaLlegada'])){
    $MatriculaC = $_POST['MatriculaC'];
    $idI = $_POST['idI'];
    $fechaLlegada = $_POST['fechaLlegada'];

    $datos = [
        'matriculaC' => $MatriculaC,
        'idI' => $idI,
        'fechaLlegada' => $fechaLlegada
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_llegadaCam.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
}



//Camioneta salida
if(isset($_POST['MatriculaC']) && isset($_POST['idI']) && isset($_POST['fechaSalida'])){
    $MatriculaC = $_POST['MatriculaC'];
    $idI = $_POST['idI'];
    $fechaSalida = $_POST['fechaSalida'];

    $datos = [
        'matriculaC' => $MatriculaC,
        'idI' => $idI,
        'fechaSalida' => $fechaSalida
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_salidaCam.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
}

//Asignar paquete a lote
if(isset($_POST['IDL']) && isset($_POST['codigo'])){
    $IDL = $_POST['IDL'];
    $codigo = $_POST['codigo'];

    $datos = [
        'IDL' => $IDL,
        'codigo' => $codigo
    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_asignarPAL.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
}


//Asignar paquete a camioneta
if(isset($_POST['MatriculaC']) && isset($_POST['codigo'])){
    $MatriculaC = $_POST['MatriculaC'];
    $codigo = $_POST['codigo'];

    $datos = [
        'MatriculaC' => $MatriculaC,
        'codigo' => $codigo

    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_asignarPAC.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
    
}


//Asignar lote a camion
if(isset($_POST['Matricula']) && isset($_POST['IDL'])){
    $Matricula = $_POST['Matricula'];
    $IDL = $_POST['IDL'];

    $datos = [
        'Matricula' => $Matricula,
        'IDL' => $IDL

    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_asignarLote.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
    
}

//rutas
if(isset($_POST['IDR']) && isset($_POST['nroRuta'])){
    $IDR = $_POST['IDR'];
    $nroRuta = $_POST['nroRuta'];

    $datos = [
        'IDR' => $IDR,
        'nroRuta' => $nroRuta
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_nrorecorrido.php");
    curl_setopt($ch,CURLOPT_POST, true);
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
if(isset($_POST['IDR']) && isset($_POST['IDA'])){
    $IDR = $_POST['IDR'];
    $IDA = $_POST['IDA'];

    $datos = [
        'IDR' => $IDR,
        'IDA' => $IDA
    ];
    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_esta.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/recorrido/recorrido.php");
    }
}


//sigue
if(isset($_POST['MatriculaSig']) && isset($_POST['IDA'])){
    $MatriculaSig = $_POST['MatriculaSig'];
    $IDA = $_POST['IDA'];

    $datos = [
        'MatriculaSig' => $MatriculaSig,
        'IDA' => $IDA

    ];

    $json = json_encode($datos);
    curl_setopt($ch,CURLOPT_URL,"http://localhost/proyecto/controller/almacen/C_sigue.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if(curl_errno($ch)){
        echo curl_error($ch);
    }else{
       header("location: http://localhost/proyecto/Views/app_almacen/almacen/almacenInterno.php");
    }
    
}




curl_close($ch);