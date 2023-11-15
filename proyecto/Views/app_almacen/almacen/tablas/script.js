// hace que la aca esa se guarde acá
document.addEventListener("DOMContentLoaded", () => {
    // Verifica si hay un idioma seleccionado en la variable de sesión
    const selectedLanguage = sessionStorage.getItem('selectedLanguage');

    if (selectedLanguage) {
        // Aplica el idioma seleccionado
        changeLanguage(selectedLanguage);
    }
});

//cambia el idioma
const FlagsElement = document.getElementById("flags");
const textsToChange = document.querySelectorAll("[data-section]");

const changeLanguage = async language => {
    const requestJson = await fetch(`../../../../languages/almacen/${language}.json`);
    const texts = await requestJson.json();

    for (const textToChange of textsToChange) {
        const section = textToChange.dataset.section;
        const value = textToChange.dataset.value;

        // Verificar si el elemento es un input o un textarea
        if (textToChange.tagName === "INPUT" || textToChange.tagName === "TEXTAREA") {
            textToChange.placeholder = texts[section][value];
            textToChange.value = texts[section][value];
        } else {
            textToChange.innerHTML = texts[section][value];
        }
    }


    // Guarda el idioma seleccionado en una variable de sesión
    sessionStorage.setItem('selectedLanguage', language);
}

FlagsElement.addEventListener("click", (e) => {
    changeLanguage(e.target.parentElement.dataset.language);
});