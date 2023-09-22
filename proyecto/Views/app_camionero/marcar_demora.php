<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['Matricula'];
    $motivo = $_POST['motivo'];

    // Enviar un correo electrónico
    $to = "QuickCarry@gmail.com";
    $subject = "Aviso de demora - Camión $matricula";
    $message = "El camión con matrícula $matricula está experimentando una demora debido a: $motivo.";
    $headers = "From: MariaPerez@gmail.com"; //como sacar el mail?

    if (mail($to, $subject, $message, $headers)) {
        echo "Aviso de demora enviado correctamente.";
    } else {
        echo "Hubo un error al enviar el aviso de demora por correo.";
    }
}
header("Location: demora.php");
