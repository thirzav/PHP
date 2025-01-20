<?php 

function comprobacionDatos() {
    
}

function comprobarCampoTxt($txt) {
    // primero quitamos los espacios innecarios al principio y al final
    $txt = trim($txt);

    $comp = true;

    if($txt == "" || $txt == [0-9]) {
        $comp = false;
    }

    return $comp;
}


// recibe un $_FILES['name'] y devuelve el formato de la foto
function formatoFoto($foto) {
    $formatoFotoAr = explode('.', $foto);

    for($i = 0; $i < count($formatoFotoAr); $i++){
        if($formatoFotoAr[$i] == "jpg" || $formatoFotoAr[$i] == "jpeg" || $formatoFotoAr[$i] == "png"){
            $formatoFoto = $formatoFotoAr[$i];
        }
    }

    return $formatoFoto;
    
}

// para guardar la imagen en la carpeta imagenes, devuelve el url de la imagen
function moverFoto($fichero, $nombreImagen, $formato) {

    if(is_uploaded_file($fichero['foto_perfil']['tmp_name'])) {

        $ruta = "../img/fotoPerfil/$nombreImagen.$formato";
        if(move_uploaded_file($fichero['foto_perfil']['tmp_name'], $ruta)){
            $url = $ruta;
        } else {
            $url = "no ha sido posible guardar la imagen";
        }

        return $url;
    }
}

function moverFoto2($fichero, $nombreImagen, $formato) {

    if(is_uploaded_file($fichero['tmp_name'])) {

        $ruta = "../img/fotos/$nombreImagen.$formato";
        if(move_uploaded_file($fichero['tmp_name'], $ruta)){
            $url = $ruta;
        } else {
            $url = "no ha sido posible guardar la imagen";
        }

        return $url;
    }
}