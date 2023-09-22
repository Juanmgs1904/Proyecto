//nav fixed
var nav = document.querySelector('.nav');
var header = document.querySelector('.header');

window.addEventListener('scroll', () => {
    if (window.scrollY >= header.clientHeight) {
        nav.classList.add('fixed');
    } else {
        nav.classList.remove('fixed');
    }
});

//carrusel<script>
    var images = [
        "img/carrusel3.png",
        "img/carrusel1.png",
        "img/carrusel2.png",
        "img/carrusel4.png"
    ];

    var carrusel = document.getElementById("carrusel");
    var prevBtn = document.getElementById("prevBtn");
    var nextBtn = document.getElementById("nextBtn");

    let currentIndex = 0;

    function showImage(index) {
        carrusel.src = images[index];
    }

    prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    });

    nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    });

    // Mostrar la primera imagen al cargar la página
    showImage(currentIndex);

    // Cambiar automáticamente cada 5 segundos
    setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }, 5000); // 5000 milisegundos 