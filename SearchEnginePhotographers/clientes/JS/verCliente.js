function mostrarPerfil() {
    // Obtener los divs por su id
    var perfil = document.getElementById('contenido1');
    var modPerfil = document.getElementById('contenido2');
    var cambiarPass = document.getElementById('contenido3');
    var delPerfil = document.getElementById('contenido4');

    // Cambiar su estilo para que sea visible
    perfil.style.display = "block";

    // Cambiar su estilo para que sea invisible
    modPerfil.style.display = "none";
    cambiarPass.style.display = "none";
    delPerfil.style.display = "none";
}

function editarPerfil() {
    // Obtener los divs por su id
    var perfil = document.getElementById('contenido1');
    var modPerfil = document.getElementById('contenido2');
    var cambiarPass = document.getElementById('contenido3');
    var delPerfil = document.getElementById('contenido4');
    
    // Cambiar su estilo para que sea visible
    modPerfil.style.display = "block";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    cambiarPass.style.display = "none";
    delPerfil.style.display = "none";
}

function cambiarPass() {
    // Obtener los divs por su id
    var perfil = document.getElementById('contenido1');
    var modPerfil = document.getElementById('contenido2');
    var cambiarPass = document.getElementById('contenido3');
    var delPerfil = document.getElementById('contenido4');
    
    // Cambiar su estilo para que sea visible
    cambiarPass.style.display = "block";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    modPerfil.style.display = "none";
    delPerfil.style.display = "none";

}


function eliminarPerfil() {
    // Obtener los divs por su id
    var perfil = document.getElementById('contenido1');
    var modPerfil = document.getElementById('contenido2');
    var cambiarPass = document.getElementById('contenido3');
    var delPerfil = document.getElementById('contenido4');
    
    // Cambiar su estilo para que sea visible
    delPerfil.style.display = "block";

    // Cambiar su estilo para que sea invisible
    perfil.style.display = "none";
    modPerfil.style.display = "none";
    cambiarPass.style.display = "none";

}