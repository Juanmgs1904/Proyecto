<?php
if (isset($_POST['enviar'])) {
    session_start();
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
            <h3 class="text-center">Iniciar Sesión</h3>
            <input type="text" name="mail" placeholder="Usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit" name="enviar" class="btn">Ingresar</button>
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
</body>

</html>