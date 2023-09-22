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
                <h1>Contáctanos</h1>
            </div>
            <div class="header__logo">
                <img src="img/Logo_sistema.png" alt="Logo de max truck">
            </div>
        </div>
    </header>
    <section class="contacto">
        <form action="correo.php" method="post" class="form">
            <div class="nom_c">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="text" name="apellido" placeholder="Apellido">
            </div>
            <input type="email" name="email" placeholder="Email" required>
            <input type="asunto" name="asunto" placeholder="Asunto" required>
            <textarea name="mensaje" cols="30" rows="10" placeholder="Ingresa tu mensaje" required></textarea>
            <button type="submit" name="enviar" class="btn">Enviar</button>
            <!-- <script>
                    
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

            </script> -->
        </form>
    </section>
</body>

</html>