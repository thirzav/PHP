let slider = document.querySelector(".slider");
let imagenes = slider.querySelectorAll('img');
let index = 0;

// Función para mover el slider
function moverSlider(index) {
    let porcentaje = index * -100;
    slider.style.transform = "translateX(" + porcentaje + "%)";
}

// Función para ir al siguiente slide
function siguiente() {
    index++;
    if (index >= imagenes.length) {  // Si llegamos al final, volvemos al inicio
        index = 0;
    }
    moverSlider(index);
}

// Función para ir al slide anterior
function anterior(numFicha) {
    slider = document.querySelector(".slider")[numFicha];
    imagenes = document.querySelectorAll("img")[numFicha];
    index--;
    if (index < 0) {  // Si llegamos al inicio, volvemos al final
        index = imagenes.length - 1;
    }
    moverSlider(index);
}

// Intervalo automático para el slider, llama función siguiente
setInterval(siguiente, 7000);

// Asignación de eventos a los botones
let botonAnterior = document.getElementById('btn_anterior');
let botonSiguiente = document.getElementById('btn_siguiente');

// hacer clic en boton, llama función anterior
botonAnterior.onclick = anterior; // sin paréntesis para no invocarla directamente cuando abre el navegador

// hacer clic en boton, llama función siguiente
botonSiguiente.onclick = siguiente;
