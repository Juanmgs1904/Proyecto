<?php
$ch = curl_init();
//Lote
if (isset($_POST['tiempoEstimadoE']) && isset($_POST['almacenExterno'])) {
    $tiempoEstimado = $_POST['tiempoEstimadoE'];
    $almacenExterno = $_POST['almacenExterno'];
    $empresa = $_GET['empresa'];

    $datos = [
        'tiempoEstimado' => $tiempoEstimado,
        'empresa' => $empresa,
        'enAlmacenExterno' => $almacenExterno
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_lotesE.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/lotes/lotesE.php?empresa=$empresa");
    }
}
if (isset($_POST['Destino']) && isset($_POST['tiempoEstimado'])) {
    $Destino = $_POST['Destino'];
    $tiempoEstimado = $_POST['tiempoEstimado'];

    $datos = [
        'estado' => "noAsignado",
        'destino' => $Destino,
        'tiempoEstimado' => $tiempoEstimado
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_lotes.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/lotes/lotes.php?idA=1");
    }
}

//Paquete
if (isset($_POST['pesoE']) && isset($_POST['fEntregaE']) && isset($_POST['DestinatarioE']) && isset($_POST['DestinoE']) && isset($_POST['departamento'])) {
    $Peso = $_POST['pesoE'];
    $Estado = "enAlmacenExterno";
    $fEntrega = $_POST['fEntregaE'];
    $Destinatario = $_POST['DestinatarioE'];
    $Destino = $_POST['DestinoE'];
    $departamento = $_POST['departamento'];
    $empresa = $_GET['empresa'];

    $datos = [
        'Peso' => $Peso,
        'Estado' => $Estado,
        'fEntrega' => $fEntrega,
        'Destinatario' => $Destinatario,
        'Destino' => $Destino,
        'Departamento' => $departamento,
        'Empresa' => $empresa
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_paquetesE.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/paquete/paquetesE.php?empresa=$empresa");
    }
}

//Camion Almacen
if (isset($_POST['Matricula']) && isset($_POST['idA'])) {
    $Matricula = $_POST['Matricula'];
    $idA = $_POST['idA'];

    $datos = [
        'matricula' => $Matricula,
        'idA' => $idA
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_vaA.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php");
    }
}


//Camioneta AlamcenInterno
if (isset($_POST['MatriculaC']) && isset($_POST['idI'])) {
    $MatriculaC = $_POST['MatriculaC'];
    $idI = $_POST['idI'];

    $datos = [
        'matriculaC' => $MatriculaC,
        'idI' => $idI
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_va.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php");
    }
}

//Camion llegada
if (isset($_POST['Matricula']) && isset($_POST['idA']) && isset($_POST['fechaLlegada'])) {
    $Matricula = $_POST['Matricula'];
    $idA = $_POST['idA'];
    $fechaLlegada = $_POST['fechaLlegada'];

    $datos = [
        'matricula' => $Matricula,
        'idA' => $idA,
        'fechaLlegada' => $fechaLlegada
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_llegada.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}

//Camion salida
if (isset($_POST['Matricula']) && isset($_POST['idA']) && isset($_POST['fechaSalida'])) {
    $Matricula = $_POST['Matricula'];
    $idA = $_POST['idA'];
    $fechaSalida = $_POST['fechaSalida'];

    $datos = [
        'matricula' => $Matricula,
        'idA' => $idA,
        'fechaSalida' => $fechaSalida
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_salida.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}

//Camioneta llegada 
if (isset($_POST['MatriculaC']) && isset($_POST['fechaLlegada'])) {
    $MatriculaC = $_POST['MatriculaC'];
    $fechaLlegada = $_POST['fechaLlegada'];
    $idA = $_GET['idA'];

    $datos = [
        'matriculaC' => $MatriculaC,
        'fechaLlegada' => $fechaLlegada
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_llegadaCam.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}



//Camioneta salida
if (isset($_POST['MatriculaC']) && isset($_POST['fechaSalida'])) {
    $MatriculaC = $_POST['MatriculaC'];
    $fechaSalida = $_POST['fechaSalida'];
    $idA = $_GET['idA'];

    $datos = [
        'matriculaC' => $MatriculaC,
        'fechaSalida' => $fechaSalida
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_salidaCam.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}

//Asignar paquete a lote
if (isset($_POST['IDL']) && isset($_POST['codigo'])) {
    $IDL = $_POST['IDL'];
    $codigo = $_POST['codigo'];
    $idA = $_GET['idA'];

    $datos = [
        'IDL' => $IDL,
        'codigo' => $codigo
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_asignarPAL.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}
if (isset($_POST['IDLE']) && isset($_POST['codigoE'])) {
    $IDL = $_POST['IDLE'];
    $codigo = $_POST['codigoE'];
    $empresa = $_GET['empresa'];

    $datos = [
        'IDL' => $IDL,
        'codigo' => $codigo
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_asignarPALE.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenExterno.php?empresa=$empresa");
    }
}


//Asignar paquete a camioneta
if (isset($_POST['MatriculaC']) && isset($_POST['codigo'])) {
    $MatriculaC = $_POST['MatriculaC'];
    $codigo = $_POST['codigo'];
    $idA = $_GET['idA'];

    $datos = [
        'MatriculaC' => $MatriculaC,
        'codigo' => $codigo
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_asignarPAC.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}


//Asignar lote a camion
if (isset($_POST['Matricula']) && isset($_POST['IDL'])) {
    $Matricula = $_POST['Matricula'];
    $IDL = $_POST['IDL'];
    $idA = $_GET['idA'];

    $datos = [
        'Matricula' => $Matricula,
        'IDL' => $IDL
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_asignarLote.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}
if (isset($_POST['MatriculaE']) && isset($_POST['IDLE'])) {
    $Matricula = $_POST['MatriculaE'];
    $IDL = $_POST['IDLE'];
    $empresa = $_GET['empresa'];

    $datos = [
        'Matricula' => $Matricula,
        'IDL' => $IDL
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_asignarLote.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenExterno.php?empresa=$empresa");
    }
}

//esta
if (isset($_POST['IDR']) && isset($_POST['IDA']) && isset($_POST['distancia'])) {
    $IDR = $_POST['IDR'];
    $IDA = $_POST['IDA'];
    $distancia = $_POST['distancia'];
    $idA = $_GET['idA'];
    $mostrar = $_GET['mostrar'];

    $datos = [
        'IDR' => $IDR,
        'IDA' => $IDA,
        'distancia' => $distancia
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_esta.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/recorrido/almacenes.php?idA=$idA&IDR=$IDR&mostrar=$mostrar");
    }
}


//sigue
if (isset($_POST['MatriculaSig']) && isset($_POST['IDR'])) {
    $MatriculaSig = $_POST['MatriculaSig'];
    $IDR = $_POST['IDR'];
    $idA = $_GET['idA'];

    $datos = [
        'matricula' => $MatriculaSig,
        'idR' => $IDR
    ];

    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_vaA.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/almacen/almacenInterno.php?idA=$idA");
    }
}

//va_hacia
if (isset($_POST['IDRL']) && isset($_POST['IDAL']) && isset($_POST['IDLL'])) {
    $IDR = $_POST['IDRL'];
    $IDA = $_POST['IDAL'];
    $IDL = $_POST['IDLL'];

    $datos = [
        'IDR' => $IDR,
        'IDA' => $IDA,
        'IDL' => $IDL
    ];
    $json = json_encode($datos);
    curl_setopt($ch, CURLOPT_URL, "localhost/Controller/almacen/C_vaHacia.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        header("location: ../Views/app_almacen/lotes/lotes.php?idA=1");
    }
}

curl_close($ch);
