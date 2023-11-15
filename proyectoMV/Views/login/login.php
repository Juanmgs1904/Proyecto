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
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
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
                <h1>Max Truck</h1>
            </div>
            <div class="header__logo">
                <img src="img/Logo_sistema.png" alt="Logo de max truck">
            </div>
        </div>
    </header>
    <main class="login">
        <form action="../../intermediario/auth.php" method="POST" class="form">
            <h3 class="text-center" data-section="login" data-value="titleL">Iniciar Sesión</h3>
            <input type="text" name="mail" data-section="login" data-value="usuario" placeholder="Usuario" required>
            <input type="password" name="contraseña" data-section="login" data-value="contra" placeholder="Contraseña" required>
            <button type="submit" name="enviar" data-section="login" data-value="btn" class="btn">Ingresar</button>
        </form>
        <div class="mensaje">
            <script>
                <?php
                if (isset($_GET["mensaje"])) {
                    $responseMsg = $_GET["mensaje"];
                    echo "var responseMsg = '$responseMsg';";
                } else {
                    echo "var responseMsg = '';";
                }

                ?>
                if (responseMsg !== '') {
                    showMessage(responseMsg);
                }


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
        </div>
    </main>
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