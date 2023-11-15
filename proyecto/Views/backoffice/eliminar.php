<?php
$conexion = new mysqli("localhost", "root", "", "ocean");

require("../../Model/session/session_administrador.php");

//conduce
if (isset($_GET['CIC'])) {
    $CIC = $_GET['CIC'];
    $sentencia = "DELETE FROM conduce WHERE CIC = '$CIC'";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/camionero/conduce_index.php");
}


//trabaja
if (isset($_GET['CIP'])) {
    $CIP = $_GET['CIP'];
    $sentencia = "DELETE FROM trabaja WHERE CIP = '$CIP'";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}



try {
    //lote
    if (isset($_GET['IDL'])) {
        $IDL = $_GET['IDL'];
        $sentencia = "DELETE FROM lotes WHERE IDL = '$IDL'";
        $filas = $conexion->query($sentencia);
        header("Location: lotes/lote_index.php");
    }
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este Lote'
                },
                en: {
                    confirmacion_eliminar: 'This Lot cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'lotes/lote_index.php';
            } else {
                window.location.href = 'lotes/lote_index.php';
            }
          </script>";
}

try {
    //paquete
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $sentencia = "DELETE FROM paquetes WHERE codigo = '$codigo'";
    $filas = $conexion->query($sentencia);
    header("Location: paquete/paquete_index.php");
}
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este paquete'
                },
                en: {
                    confirmacion_eliminar: 'This package cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'paquete/paquete_index.php';
            } else {
                window.location.href = 'paquete/paquete_index.php';
            }
          </script>";
}

try {
//camión
if (isset($_GET['Matricula'])) {
    $Matricula = $_GET['Matricula'];
    $sentencia = "DELETE FROM camion WHERE Matricula = '$Matricula'";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/camiones/camion_index.php");
}
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este camion'
                },
                en: {
                    confirmacion_eliminar: 'This truck cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'vehiculos/camiones/camion_index.php';
            } else {
                window.location.href = 'vehiculos/camiones/camion_index.php';
            }
          </script>";
}

try {
    //camioneta
    if (isset($_GET['MatriculaC'])) {
        $MatriculaC = $_GET['MatriculaC'];
        $sentencia = "DELETE FROM camioneta WHERE MatriculaC = '$MatriculaC'";
        $filas = $conexion->query($sentencia);
        header("Location: vehiculos/camionetas/camioneta_index.php");
    }
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar esta camioneta'
                },
                en: {
                    confirmacion_eliminar: 'This van cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'vehiculos/camionetas/camioneta_index.php';
            } else {
                window.location.href = 'vehiculos/camionetas/camioneta_index.php';
            }
          </script>";
}


try {
    //camioneta en va
    if (isset($_GET['MatriculaVa'])) {
        $MatriculaC = $_GET['MatriculaVa'];
        $sentencia = "DELETE FROM va WHERE MatriculaC = '$MatriculaC'";
        $filas = $conexion->query($sentencia);
        header("Location: vehiculos/camionetas/camioneta_index.php");
    }
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar esta camioneta'
                },
                en: {
                    confirmacion_eliminar: 'This van cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'vehiculos/camionetas/camioneta_index.php';
            } else {
                window.location.href = 'vehiculos/camionetas/camioneta_index.php';
            }
          </script>";
}


try {
    
//vehiculo
if (isset($_GET['MatriculaV'])) {
    $MatriculaV = $_GET['MatriculaV'];
    $sentencia = "DELETE FROM vehiculo WHERE MatriculaV = '$MatriculaV'";
    $filas = $conexion->query($sentencia);
    header("Location: vehiculos/vehiculo/vehiculo_index.php");
}

} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este vehículo'
                },
                en: {
                    confirmacion_eliminar: 'This vehicle cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'vehiculos/vehiculo/vehiculo_index.php';
            } else {
                window.location.href = 'vehiculos/vehiculo/vehiculo_index.php';
            }
          </script>";
}

try {
    //almacen
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sentencia = "DELETE FROM almacen WHERE id = '$id'";
        $filas = $conexion->query($sentencia);
        header("Location: almacenes/almacen/almacen_index.php");
    }
    
    
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este almacén'
                },
                en: {
                    confirmacion_eliminar: 'This Warehouse cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'almacenes/almacen/almacen_index.php';
            } else {
                window.location.href = 'almacenes/almacen/almacen_index.php';
            }
          </script>";
}


try {
   
//almacenInterno
if (isset($_GET['idI'])) {
    $idI = $_GET['idI'];
    $sentencia = "DELETE FROM almaceninterno WHERE idI = '$idI'";
    $filas = $conexion->query($sentencia);
    header("Location: almacenes/almacenInterno/almacenInterno_index.php");
}
    
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este almacén'
                },
                en: {
                    confirmacion_eliminar: 'This Warehouse cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'almacenes/almacenInterno/almacenInterno_index.php';
            } else {
                window.location.href = 'almacenes/almacenInterno/almacenInterno_index.php';
            }
          </script>";
}


try {

    //almacenExterno
    if (isset($_GET['idE'])) {
        $idE = $_GET['idE'];
        $sentencia = "DELETE FROM almacenexterno WHERE idE = '$idE'";
        $filas = $conexion->query($sentencia);
        header("Location: almacenes/almacenExterno/almacenExterno_index.php");
    }
    
    
} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este almacén'
                },
                en: {
                    confirmacion_eliminar: 'This Warehouse cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'almacenes/almacenExterno/almacenExterno_index.php';
            } else {
                window.location.href = 'almacenes/almacenExterno/almacenExterno_index.php';
            }
          </script>";
}

try {
    
//camionero
if (isset($_GET['ciC'])) {
    $ciC = $_GET['ciC'];
    $sentencia = "DELETE FROM camionero WHERE CIC = '$ciC'";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/camionero/camionero_index.php");
}

} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este camionero'
                },
                en: {
                    confirmacion_eliminar: 'This trucker cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'usuarios/camionero/camionero_index.php';
            } else {
                window.location.href = 'usuarios/camionero/camionero_index.php';
            }
          </script>";
}

try {
   
//personal
if (isset($_GET['ciP'])) {
    $ciP = $_GET['ciP'];
    $sentencia = "DELETE FROM personal WHERE CIP = '$ciP'";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personal/personal_index.php");
}

} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este trabajador'
                },
                en: {
                    confirmacion_eliminar: 'This Staff cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'usuarios/personal/personal_index.php';
            } else {
                window.location.href = 'usuarios/personal/personal_index.php';
            }
          </script>";
}

try {
    
//personas
if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    $sentencia = "DELETE FROM personas WHERE CI = '$ci'";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/personas/personas_index.php");
}

} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar esta persona'
                },
                en: {
                    confirmacion_eliminar: 'This person cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'usuarios/personas/personas_index.php';
            } else {
                window.location.href = 'usuarios/personas/personas_index.php';
            }
          </script>";
}

try {
    
//usuario
if (isset($_GET['Mail'])) {
    $Mail = $_GET['Mail'];
    $sentencia = "DELETE FROM usuario WHERE Mail = '$Mail'";
    $filas = $conexion->query($sentencia);
    header("Location: usuarios/usuario/usuario_index.php");
}

} catch (mysqli_sql_exception $e) {
    $error_message = $e->getMessage();
    echo "<script>
            var selectedLanguage = sessionStorage.getItem('selectedLanguage');
            const messages = {
                es: {
                    confirmacion_eliminar: 'No se puede eliminar este usuario'
                },
                en: {
                    confirmacion_eliminar: 'This user cannot be deleted'
                }
            };
            var confirmation = confirm(messages[selectedLanguage].confirmacion_eliminar);
            if (confirmation) {
                window.location.href = 'usuarios/usuario/usuario_index.php';
            } else {
                window.location.href = 'usuarios/usuario/usuario_index.php';
            }
          </script>";
}
