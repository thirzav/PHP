<?php

require_once "../funciones/conexionDB.php";

// ----------------------------------------- GET -------------------------------------------

// -------------- para el adminisitrador -----------------------

// para recoger info de 1 fotógrafo
function getFotografo($fotografo_id) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $fotografo = $conexion->query("SELECT * FROM fotografos WHERE fotografo_id = '$fotografo_id'");
    }

    return $fotografo;
    $conexion->close();
}

// para recoger toda la info de los fotógrafos para la lista para administrador
function getFotografos(){
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $fotografos = $conexion->query("SELECT * FROM fotografos");
    }

    return $fotografos;
    $conexion->close();
}

// ------------------- para el usuario/cliente ----------------------

// para recoger las ciudades de la barra de filtros
function getCiudadFotografo() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $ciudades = $conexion->query("SELECT fotografo_id, ciudad_f, fecha_crea_f, fecha_mod_f FROM fotografos");
    }

    return $ciudades;
    $conexion->close();
}

// para recoger la info necesario para hacer las fichas del index
function getInfoFicha() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</p>";
    } else {
        $infoFicha = $conexion->query("SELECT f.fotografo_id, f.nombre_f, f.apellido1_f, f.apellido2_f, f.nombre_empresa, f.ciudad_f, f.descripcion_f, f.telefono_f, f.email, pfc.product_id, p.nombre_p, p.descripcion, p.pve, fotos.imagen1, fotos.imagen2, fotos.imagen3, fotos.imagen4, fotos.imagen5 FROM fotografos f LEFT JOIN prod_fot_cat pfc ON f.fotografo_id = pfc.fotografo_id LEFT JOIN productos p ON pfc.product_id = p.product_id LEFT JOIN fotos ON pfc.foto_id = fotos.foto_id");
    }

    return $infoFicha;
    $conexion->close();
}

// retorna la info necesario para hacer las fichas del una categoria específica
function getInfoFichaConId($categoria_id) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</p>";
    } else {
        $infoFicha = $conexion->query("SELECT f.fotografo_id, f.nombre_f, f.apellido1_f, f.apellido2_f, f.nombre_empresa, f.ciudad_f, f.descripcion_f, f.telefono_f, f.email_f, pfc.product_id, p.nombre_p, p.descripcion, p.pve, fotos.imagen1, fotos.imagen2, fotos.imagen3, fotos.imagen4, fotos.imagen5 FROM fotografos f LEFT JOIN prod_fot_cat pfc ON f.fotografo_id = pfc.fotografo_id LEFT JOIN productos p ON pfc.product_id = p.product_id LEFT JOIN fotos ON pfc.foto_id = fotos.foto_id WHERE pfc.categoria_id = '$categoria_id'");
    }

    return $infoFicha;
    $conexion->close();
}

// para recoger información del fotógrafo con fotos para la ficha de fotógrafo
function getFotografoCat($fotografo_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $fotografoCat = $conexion->query("SELECT f.fotografo_id, f.nombre_empresa, fotos.nombre_foto, fotos.imagen1, fotos.imagen2, fotos.imagen3, fotos.imagen4, fotos.imagen5, c.nombre_cat, pr.nombre_p, pr.pve FROM fotografos f LEFT JOIN prod_fot_cat p ON f.fotografo_id = p.fotografo_id LEFT JOIN fotos ON p.foto_id = fotos.foto_id LEFT JOIN categorias c ON p.categoria_id = c.categoria_id INNER JOIN productos pr ON p.product_id = pr.product_id WHERE f.fotografo_id = '$fotografo_id'");
    }

    return $fotografoCat;
    $conexion->close();
}

function getNombreEmpresaConEmail($email) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $nombreEmpresa = $conexion->query("SELECT fotografo_id, nombre_empresa FROM fotografos WHERE email_f = '$email'");
    }

    return $nombreEmpresa;
    $conexion->close();
}

// retorna fotog$fotografo_id pasando email como parámetro
function getFotografoId($email) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $fotografo_id = $conexion->query("SELECT fotografo_id FROM fotografos WHERE email_f = '$email'");
    }

    return $fotografo_id;
    $conexion->close();
}

// ---------------------------------------------------------- SET -------------------------------------------------------------

function setFotografo($fotografo) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('INSERT INTO fotografos(nombre_f, apellido1_f, apellido2_f, nombre_empresa, nif, direccion_calle_f, postcode_f, ciudad_f, descripcion_f, foto_perfil, telefono_f, email_f, pass_f, rol) VALUES ("' . $fotografo->getNombreF() . '","' . $fotografo->getApellido1F() .'","' . $fotografo->getApellido2F() . '","' . $fotografo->getNombreEmpresa() . '","' . $fotografo->getNif() . '","' . $fotografo->getCalle() . '","' . $fotografo->getPostcodeF() . '","' . $fotografo->getCiudadF() . '","' . $fotografo->getDescripcionF() . '","' . $fotografo->getFotoPerfil() . '","' . $fotografo->getTelefonoF() . '","' . $fotografo->getEmail() . '","' . $fotografo->getPassF() . '","' . $fotografo->getRol() .'")');
    }

    $conexion->close();
}

// ----------------------------------------------------------- UPDATE -----------------------------------------------------------

function updateFotografo($updateFotografo, $fotografo_id){
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('UPDATE fotografos SET nombre_f ="' . $updateFotografo->getNombreF() . '", apellido1_f = "' . $updateFotografo->getApellido1F() . '", apellido2_f = "' . $updateFotografo->getApellido2F() . '", nombre_empresa = "' . $updateFotografo->getNombreEmpresa() . '", nif = "' . $updateFotografo->getNif() . '", direccion_calle_f = "' . $updateFotografo->getCalle() . '", postcode_f = "' . $updateFotografo->getPostcodeF() . '", ciudad_f = "' . $updateFotografo->getCiudadF() . '", descripcion_f = "' . $updateFotografo->getDescripcionF() . '", foto_perfil = "' . $updateFotografo->getFotoPerfil() . '", telefono_f = "' . $updateFotografo->getTelefonoF() . '", email_f = "' . $updateFotografo->getEmail() . '" WHERE fotografo_id = "'. $fotografo_id . '"');
    }

    $conexion->close();
}

// cambia la contraseña en la BBDD de un fotógrafo
function updatePassFotografo($pass, $fotografo_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("UPDATE fotografos SET pass_f ='$pass' WHERE fotografo_id = '$fotografo_id'");
    }

    $conexion->close();
}

// --------------------------------------------------------------- DELETE -----------------------------------------------------------

function deleteFotografo($fotografo_id){
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("DELETE FROM fotografos WHERE fotografo_id = '$fotografo_id'");
    }

    $conexion->close();
}