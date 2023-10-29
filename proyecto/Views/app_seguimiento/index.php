<?php
session_start();

if(isset($_GET['lang'])){
    $_SESSION['selectedLanguage'] = $_GET['lang'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Seguimiento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="fondo">
    <header class="header">
        <div class="header__contenedor">
            <a href="../../index.php" class="home">
                <img src="img/home.svg" alt="Icono home">
            </a>
            <div class="title">
                <h1 class="text-center" data-section="seguimiento" data-value="title">Seguimiento</h1>
            </div>
            <img src="img/Logo_sistema.png" alt="imagen logo"> 
        </div>
    </header>
    <main class="info">
        <div class="text">
            <h3 class="text-center" data-section="seguimiento" data-value="subtitle">Ve Donde Está tu Paquete</h3>
        </div>
        <form action="infoPaquete.php" class="form" method="POST">
            <div class="form__contenedor">
                <img src="img/paquete_blanco.png" alt="imagen paquete">
                <input type="text" name="codigo" data-section="seguimiento" data-value="codigo" placeholder="Ingrese el Código del Paquete" required>
            </div>
            <div class="btn">
                <button type="submit" class="button" data-section="seguimiento" data-value="btn">Buscar</button>
            </div>
        </form>
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