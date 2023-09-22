<?php
if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['asunto']) && isset($_POST['mensaje'])) {
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $asunto = filter_var($_POST['asunto'], FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_EMAIL);
    $destinatario = "mailDestiono@gmail.com";
    $cuerpo = '
    <html>
        <head>
            <title>Mensaje por Correo</title>
        </head>
        <body>
            <h1>Email de '. $nombre . $apellido .'</h1>
            <h2>Email: '.$email.'</h2>
            <p>Mensaje: ' .$mensaje. '</p>
        </body>
    </html>
    ';

    //para el envío en formato HTMl
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; cherset=UTF8\r\n";

    //dirección del remitente
    $headers .= "FROM: $nombre $apellido <$email>\r\n";
    @mail($destinatario,$asunto,$cuerpo,$headers);

    echo "Correo enviado";
}else {
    echo "Error al enviar el mensaje";
}
?>