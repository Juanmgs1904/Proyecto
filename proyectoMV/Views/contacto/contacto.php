<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['selectedLanguage'] = $_GET['lang'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__home">
                <a href="../../index.php">
                    <img src="img/home.svg" alt="imagen home">
                </a>
            </div>
            <div class="header__titulo">
                <h1 data-section="contactanos" data-value="title">Contáctanos</h1>
            </div>
            <div class="header__logo">
                <img src="img/Logo_sistema.png" alt="Logo de max truck">
            </div>
        </div>
    </header>
    <section class="contacto">
        <form action="https://formsubmit.co/QuickCarryOficial@gmail.com" method="POST" class="form">
            <div class="nom_c">
                <input type="text" name="nombre" data-section="contactanos" data-value="nombre" placeholder="Nombre">
                <input type="text" name="apellido" data-section="contactanos" data-value="apellido" placeholder="Apellido">
            </div>
            <input type="email" name="email" placeholder="Email" required>
            <input type="asunto" name="asunto" data-section="contactanos" data-value="asunto" placeholder="Asunto" required>
            <textarea name="mensaje" cols="30" rows="10" data-section="contactanos" data-value="mensaje" placeholder="Ingresa tu mensaje" required></textarea>
            <button type="submit" class="btn" data-section="contactanos" data-value="btn">Enviar</button>

            <script>


                function showMessage(message) {
                    const selectedLanguage = sessionStorage.getItem('selectedLanguage');

                    const messages = {
                        es: {
                            mensaje_enviado: "El mensaje se envió correctamente"
                        },
                        en: {
                            mensaje_enviado: "The message was sent successfully"
                        }
                    };

                    const messageToDisplay = messages[selectedLanguage].mensaje_enviado;

                    var alertDiv = document.createElement('div');
                    alertDiv.className = 'custom-alert';
                    alertDiv.textContent = messageToDisplay;
                    document.body.appendChild(alertDiv);

                    // Ocultar el mensaje después de 2 segundos
                    setTimeout(function() {
                        document.body.removeChild(alertDiv);
                    }, 2000);
                }
            </script>
        </form>

    </section>
    <footer class="footer">
        <div class="contact">
            <div class="info">
                <div class="logo_info">
                    <img src="img/Logo_sistema.png" alt="logo" class="logo-system">
                    <h2 class="h-info">Max Truck</h2>
                </div>
                <h3>&#9400Quick Carry</h3>
            </div>
            <div class="flags" id="flags">
                <div class="flags__item" data-language="es" onclick="changeLanguage('es')">
                    <img src="../../img/es.svg" alt="opción español">
                </div>
                <div class="flags__item" data-language="en" onclick="changeLanguage('en')">
                    <img src="../../img/en.svg" alt="opción inglés">
                </div>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>