<?php

require_once "./funciones/conexionDB.php";

// para recoger las categorias

function getCategorias() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $categorias = $conexion->query("SELECT * FROM categorias");
    }

    return $categorias;
    $conexion->close();
}

// para recoger las ciudades de la barra de filtros

function getCiudadFotografo() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $ciudades = $conexion->query("SELECT fotografo_id, ciudad_f, fecha_crea_f, fecha_mod_f FROM fotografos");
        // con un distinct podría haber cogido sólo las ciudades distintas
    }

    return $ciudades;
    $conexion->close();
}

// para retornar solo las ciudades que son distintas
function getCiudadDistinta(){
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $ciudades = $conexion->query("SELECT DISTINCT ciudad_f FROM fotografos");
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
        $infoFicha = $conexion->query("SELECT f.fotografo_id, f.nombre_f, f.apellido1_f, f.apellido2_f, f.nombre_empresa, f.ciudad_f, f.descripcion_f, f.telefono_f, f.email_f, pfc.product_id, p.nombre_p, p.descripcion, p.pve, fotos.imagen1, fotos.imagen2, fotos.imagen3, fotos.imagen4, fotos.imagen5 FROM fotografos f INNER JOIN prod_fot_cat pfc ON f.fotografo_id = pfc.fotografo_id INNER JOIN productos p ON pfc.product_id = p.product_id INNER JOIN fotos ON pfc.foto_id = fotos.foto_id");
    }

    return $infoFicha;
    $conexion->close();
}

// retorna categorias que ha pedido el cliente

function getInfoFichaFiltros($sentencia) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</p>";
    } else {
        $infoFicha = $conexion->query("$sentencia");
    }

    return $infoFicha;
    $conexion->close();
}