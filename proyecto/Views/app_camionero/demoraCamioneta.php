<?php

require("../../Model/session/session_camioneta.php");

$url = 'http://localhost/proyecto/controller/transito/C_camionetas.php';
require("../../intermediario/getDataAPI.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso Demora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="formulario">
    <h1 class="text-center titulo">Aviso Demora</h1>
    <form action="https://formsubmit.co/brunocarras28@gmail.com" method="POST" class="form">
        <h2 class="form__titulo text-center">Ingrese Datos</h2>
        <div class="datos">
            <p>Matricula:</p>
            <select name="MatriculaC">
                <?php
                $matriculasMostradas = array();
                foreach ($array as $fila) {
                    $matriculaC = $fila['MatriculaC'];
                    if (!in_array($matriculaC, $matriculasMostradas)) {
                        // Si no se ha mostrado, muestra la matrícula y agrega al array
                        $matriculasMostradas[] = $matriculaC;
                        echo '<option value="' . $fila['MatriculaC'] . '">' . $fila['MatriculaC'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="datos">
            <p>Motivo:</p>
            <select name="motivo" id="">
                <option value="">Fallo del camión</option>
                <option value="">Control de tránsito</option>
                <option value="">Tránsito</option>
            </select>
        </div>
        <div class="form__btn">
            <input type="submit" value="Avisar Demora" class="btn">
        </div>

        <script>
            document.querySelector(".form").addEventListener("submit", function(event) {
                event.preventDefault();
                showMessage("El mensaje se envió correctamente");
            });

            function showMessage(message) {
                var alertDiv = document.createElement('div');
                alertDiv.className = 'custom-alert';
                alertDiv.textContent = message;
                document.body.appendChild(alertDiv);

                // Ocultar el mensaje después de 2 segundos
                setTimeout(function() {
                    document.body.removeChild(alertDiv);
                }, 2000);
            }
        </script>

    </form>
    <div class="btn_volver">
        <a href="indexCamioneta.php" class="boton">Volver</a>
    </div>
</body>

</html>