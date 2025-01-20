// Obtener los divs por su id
let perfil = document.getElementById('contenido1');
let modPerfil = document.getElementById('contenido2');
let misProductos = document.getElementById('contenido3');
let pedidos = document.getElementById('contenido4');
let nuevoPass = document.getElementById('contenido5');
let delPerfil = document.getElementById('contenido6');

let fotografoProductos = document.getElementById('div_productos');
let navContenido = document.getElementById('nav_contenido');

function mostrarPerfil() {
    // Cambiar su estilo para que sea visible
    perfil.style.display = "block";

    // Cambiar su estilo para que sea invisible
    modPerfil.style.display = "none";
    misProductos.style.display = "none";
    pedidos.style.display = "none";
    nuevoPass.style.display = "none";
    delPerfil.style.display = "none";
}

function editarPerfil() {
    // Cambiar su estilo para que sea visible
    modPerfil.style.display = "block";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    misProductos.style.display = "none";
    pedidos.style.display = "none";
    nuevoPass.style.display = "none";
    delPerfil.style.display = "none";
}

function productos(){
    // Cambiar su estilo para que sea visible
    misProductos.style.display = "block";
    fotografoProductos.style.display = "grid";
    navContenido.style.display = "none";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    modPerfil.style.display = "none";
    pedidos.style.display = "none";
    nuevoPass.style.display = "none";
    delPerfil.style.display = "none";
}

function mostrarPedidos() {
    // Cambiar su estilo para que sea visible
    pedidos.style.display = "block";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    modPerfil.style.display = "none";
    misProductos.style.display = "none";
    nuevoPass.style.display = "none";
    delPerfil.style.display = "none";
}

function cambiarPass() {    
    // Cambiar su estilo para que sea visible
    nuevoPass.style.display = "block";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    modPerfil.style.display = "none";
    misProductos.style.display = "none";
    pedidos.style.display = "none";
    delPerfil.style.display = "none";

}

function eliminarPerfil() {    
    // Cambiar su estilo para que sea visible
    delPerfil.style.display = "block";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    modPerfil.style.display = "none";
    nuevoPass.style.display = "none";
    misProductos.style.display = "none";
    pedidos.style.display = "none";
}

// para cambiar los botones que aparecen en el navbar de los del productos a los del perfil
function volverNavContenido() {
    misProductos.style.display = "none";
    fotografoProductos.style.display = "none";
    navContenido.style.display = "grid";

}