document.addEventListener("DOMContentLoaded", () => {
    const selectedLanguage = localStorage.getItem('selectedLanguage');

    if (selectedLanguage) {
        changeLanguage(selectedLanguage);
    }
});

const FlagsElement = document.getElementById("flags");
const textsToChange = document.querySelectorAll("[data-section]");
const imagesToChange = document.querySelectorAll(".barra, .barraC");

const changeLanguage = async language => {
    const requestJson = await fetch(`../../languages/homepage/${language}.json`);
    const texts = await requestJson.json();

    for (const textToChange of textsToChange) {
        const section = textToChange.dataset.section;
        const value = textToChange.dataset.value;

        if (textToChange.tagName === "INPUT" || textToChange.tagName === "TEXTAREA") {
            textToChange.placeholder = texts[section][value];
        } else {
            textToChange.innerHTML = texts[section][value];
        }
    }

    if (language === 'es') {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra1')) {
                image.src = 'img/entrega_1.png';
            } else if (image.classList.contains('barraC1')) {
                image.src = 'img/entregaC_1.png';
            }
        });
    } else {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra1')) {
                image.src = 'img/entregaEN_1.png';
            } else if (image.classList.contains('barraC1')) {
                image.src = 'img/entregaCEN_1.png';
            }
        });
    }


    if (language === 'es') {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra2')) {
                image.src = 'img/entrega_2.png';
            } else if (image.classList.contains('barraC2')) {
                image.src = 'img/entregaC_2.png';
            }
        });
    } else {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra2')) {
                image.src = 'img/entregaEN_2.png';
            } else if (image.classList.contains('barraC2')) {
                image.src = 'img/entregaCEN_2.png';
            }
        });
    }

    if (language === 'es') {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra3')) {
                image.src = 'img/entrega_3.png';
            } else if (image.classList.contains('barraC3')) {
                image.src = 'img/entregaC_3.png';
            }
        });
    } else {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra3')) {
                image.src = 'img/entregaEN_3.png';
            } else if (image.classList.contains('barraC3')) {
                image.src = 'img/entregaCEN_3.png';
            }
        });
    }

    if (language === 'es') {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra4')) {
                image.src = 'img/entrega_4.png';
            } else if (image.classList.contains('barraC4')) {
                image.src = 'img/entregaC_4.png';
            }
        });
    } else {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra4')) {
                image.src = 'img/entregaEN_4.png';
            } else if (image.classList.contains('barraC4')) {
                image.src = 'img/entregaCEN_4.png';
            }
        });
    }

    
    if (language === 'es') {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra5')) {
                image.src = 'img/entrega_5.png';
            } else if (image.classList.contains('barraC5')) {
                image.src = 'img/entregaC_5.png';
            }
        });
    } else {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra5')) {
                image.src = 'img/entregaEN_5.png';
            } else if (image.classList.contains('barraC5')) {
                image.src = 'img/entregaCEN_5.png';
            }
        });
    }

    
    if (language === 'es') {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra6')) {
                image.src = 'img/entrega_6.png';
            } else if (image.classList.contains('barraC6')) {
                image.src = 'img/entregaC_6.png';
            }
        });
    } else {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra6')) {
                image.src = 'img/entregaEN_6.png';
            } else if (image.classList.contains('barraC6')) {
                image.src = 'img/entregaCEN_6.png';
            }
        });
    }


    
    if (language === 'es') {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra7')) {
                image.src = 'img/entrega_7.png';
            } else if (image.classList.contains('barraC7')) {
                image.src = 'img/entregaC_7.png';
            }
        });
    } else {
        imagesToChange.forEach(image => {
            if (image.classList.contains('barra7')) {
                image.src = 'img/entregaEN_7.png';
            } else if (image.classList.contains('barraC7')) {
                image.src = 'img/entregaCEN_7.png';
            }
        });
    }

    localStorage.setItem('selectedLanguage', language);
}

FlagsElement.addEventListener("click", (e) => {
    changeLanguage(e.target.parentElement.dataset.language);
});