const maxTamaño = 2 * 1024 * 1024; //2MB en bytes = tamaño máximo de las fotos que se pueden subir

function validarFormulario() {
    let comp = 0; // para comprobar cuántos errorMsg hay

    for (let i = 1; i < 6; i++) {
        let img = document.getElementById('foto_perfil');
        let archivo = img.files[0] // para obtener el archivo que el usuario ha seleccionado

        console.log(archivo.size)
        if(archivo.size > maxTamaño) {
            let errorMsg = document.getElementById('error1');
            errorMsg.style.display = "block";
            comp = comp + 1;
        } 
        
    }

    if(comp > 0){
        event.preventDefault(); // con event se para el evento que se estaba ejecutando
    }
}