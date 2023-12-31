<?php

session_start();
session_destroy();
if(isset($_GET['lang'])){
    $_SESSION['selectedLanguage'] = $_GET['lang'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Truck</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header class="header" id="header">
        <div class="header__img">
            <img src="img/header.jpg" alt="Header">
        </div>
    </header>
    <nav class="nav">
        <div class="nav__contenedor">
            <input type="checkbox" id="menuD" class="menu-toggle">
            <label for="menuD" class="label"><img src="img/menu.png" alt="imagen menu" class="menuimg"></label>
            <ul class="nav__lista">
                <li class="nav__valor"><a href="index.php#header" data-section="nav" data-value="op1">Inicio</a></li>
                <li class="nav__valor"><a href="index.php#nosotros" data-section="nav" data-value="op2">Sobre Nosotros</a></li>
                <li class="nav__valor"><a href="Views/contacto/contacto.php" data-section="nav" data-value="op3">Contacto</a></li>
                <li class="nav__valor"><a href="Views/app_seguimiento/index.php" data-section="nav" data-value="op4">Seguimiento</a></li>
                <li class="nav__valor"><a href="Views/login/login.php" data-section="nav" data-value="op5">Iniciar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <section class="imagenes">
        <div class="botones">
            <div id="prevBtn" class="btn">
                < </div>
                    <div id="nextBtn" class="btn">></div>
            </div>
            <div class="img">
                <img id="carrusel" src="img/carrusel3.png" alt="Imagen camión">
            </div>

    </section>


    <section class="servicios">
        <h2 class="text-center" data-section="servicios" data-value="title">Servicios</h2>
        <div class="servicios__contenedor">
            <div class="icono">
                <div class="servicios__icono">
                    <img src="img/icono_almacen.png" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center">
                    <h3 data-section="servicios" data-value="ser1">Almacenes</h3>
                </div>
            </div>
            <div class="icono">
                <div class="servicios__icono">
                    <img src="img/icono_lotes.png" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center">
                    <h3 data-section="servicios" data-value="ser2">Armado de Lotes</h3>
                </div>
            </div>
            <div class="icono">
                <div class="servicios__icono servicios__icono--camion">
                    <img src="img/icono_camion.png" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center">
                    <h3 data-section="servicios" data-value="ser3">Transporte y Distribución</h3>
                </div>
            </div>
            <div class="icono">
                <div class="servicios__icono servicios__icono--pais">
                    <img src="img/icono_uruguay.png" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center" id="nosotros">
                    <h3 data-section="servicios" data-value="ser4">Comercio en todo el país</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="sobre-nosotros">
        <div class="sobre-nosotros__contenedor">
            <div class="espacio sobre-nosotros__grid">
                <div class="sobre-nosotros__texto">
                    <h2 data-section="sobreNosotros" data-value="title">Sobre Nosotros</h2>
                    <p data-section="sobreNosotros" data-value="text">Somos Quick Carry, empresa de logistica ubicada en Uruguay, con almacenes posicionados por todo
                        el país, teniendo nuestra central principal en Montevideo.
                        <br>
                        Ademas de contar con un alto nivel tecnologico, nuestros sistemas también poseen un alto nivel
                        de seguridad igual que nuestros camiones.
                        <br>Quieres transporta cualquier cosa a otro punto del país, pues con nosotros tus envios
                        llegaran seguros y en fecha.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="elegirnos">
        <h2 class="text-center" data-section="elegirnos" data-value="title">¿Por qué Elegirnos?</h2>
        <div class="servicios__contenedor">
            <div class="icono">
                <div class="servicios__icono">
                    <img src="img/icono_velocidad.svg" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center">
                    <h3 data-section="elegirnos" data-value="elT1">Velocidad de Entrega</h3>
                    <p data-section="elegirnos" data-value="el1">Optimiza el recorrido y el tiempo de reparto</p>
                </div>
            </div>
            <div class="icono">
                <div class="servicios__icono">
                    <img src="img/icono_almacen.png" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center">
                    <h3 data-section="elegirnos" data-value="elT2">Almacenes por Todo el País</h3>
                    <p data-section="elegirnos" data-value="el2">Permite entregar productos en cualquier parte del país</p>
                </div>
            </div>
            <div class="icono">
                <div class="servicios__icono">
                    <img src="img/icono_seguro.png" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center">
                    <h3 data-section="elegirnos" data-value="elT3">Más Seguro</h3>
                    <p data-section="elegirnos" data-value="el3">Evita las entregas fallidas. Trackeo y control de las entregas</p>
                </div>
            </div>
            <div class="icono">
                <div class="servicios__icono">
                    <img src="img/icono_rentable.svg" alt="imagen icono">
                </div>
                <div class="servicios__titulo text-center">
                    <h3 data-section="elegirnos" data-value="elT4">Más rentable</h3>
                    <p data-section="elegirnos" data-value="el4">Mejora la satisfacción de los clientes y genera más ventas</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="contact">
            <div class="info">
                <div class="logo_info">
                    <img src="img/Logo_sistema.png" alt="" class="logo-system">
                    <h2 class="h-info">Max Truck</h2>
                </div>
                <h3>&#9400Quick Carry</h3>
            </div>
            <div class="flags" id="flags">
                <div class="flags__item" data-language="es" onclick="changeLanguage('es')">
                    <img src="img/es.svg" alt="opción español">
                </div>
                <div class="flags__item" data-language="en" onclick="changeLanguage('en')">
                    <img src="img/en.svg" alt="opción inglés">
                </div>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>