<?php

require_once "../funciones/conexionDB.php";

function getFotos() {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</pre>";
    } else {
        $productos = $conexion->query("SELECT * FROM fotos");
    }

    return $productos;
    $conexion->close();
}

// añade un registro nuevo a fotos
function setFotos($fotos) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('INSERT INTO fotos(nombre_foto, imagen1, imagen2, imagen3, imagen4, imagen5) VALUES ("' . $fotos->getNombreFoto() . '", "' . $fotos->getImagen1() . '", "' . $fotos->getImagen2() . '", "' . $fotos->getImagen3() . '", "' . $fotos->getImagen4() . '", "' . $fotos->getImagen5() . '")');
    }

    $conexion->close();
}

// cambiar registro de foto
function updateFotos($fotos, $foto_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('UPDATE fotos SET nombre_foto ="' . $fotos->getNombreFoto() . '", imagen1 ="' . $fotos->getImagen1() . '", imagen2 ="' . $fotos->getImagen2() . '", imagen3 ="' . $fotos->getImagen3() . '", imagen4 ="' . $fotos->getImagen4() . '", imagen5 ="' . $fotos->getImagen5() . '" WHERE foto_id = "'. $foto_id . '"');
    }

    $conexion->close();
}