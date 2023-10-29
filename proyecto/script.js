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


    document.addEventListener("DOMContentLoaded", () => {
        // Verifica si hay un idioma seleccionado en la variable de sesión
        const selectedLanguage = sessionStorage.getItem('selectedLanguage');
    
        if(selectedLanguage){
            // Aplica el idioma seleccionado
            changeLanguage(selectedLanguage);
        }
    });

    //cambio de idioma
    const FlagsElement = document.getElementById("flags");

    const textsToChange = document.querySelectorAll("[data-section]");

    const changeLanguage = async language => {
        const requestJson = await fetch(`languages/homepage/${language}.json`);
        const texts = await requestJson.json();

        for(const textToChange of textsToChange){
            const section = textToChange.dataset.section;
            const value = textToChange.dataset.value;

            textToChange.innerHTML=texts[section][value];
        }

         // Guarda el idioma seleccionado en una variable de sesión
        sessionStorage.setItem('selectedLanguage', language);
    }

    FlagsElement.addEventListener("click", (e) => {
        changeLanguage(e.target.parentElement.dataset.language);//se obtiene el identificador para llamar al json
    });