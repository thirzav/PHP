<?php 

require_once "../funciones/conexionDB.php";

// ------------------------------------------------ retorna todas las categorias de la BBDD ------------------------------------------------
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

function getCategoria($categoria_id) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $categoria = $conexion->query("SELECT * FROM categorias WHERE categoria_id = '$categoria_id'");
    }

    return $categoria;
    $conexion->close();
}

// ------------------------------------------------ añade un registro nuevo a categorias -------------------------------------------------------
function setCategoria($categoria) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('INSERT INTO categorias(nombre_cat) VALUES ("' . $categoria->getNombreCat() . '")');
    }

    $conexion->close();
}

// ------------------------------------------------------- cambia un registro en la BBDD -------------------------------------------------------
function updateCategoria($updateCategoria, $categoria_id){
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('UPDATE categorias SET nombre_cat ="' . $updateCategoria->getNombreCat() . '" WHERE categoria_id = "'. $categoria_id . '"');
    }

    $conexion->close();
}

// ---------------------------------------------------------- elimina una categoria ----------------------------------------------------------------
function deleteCategoria($categoria_id){
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("DELETE FROM categorias WHERE categoria_id = '$categoria_id'");
    }

    $conexion->close();
}

