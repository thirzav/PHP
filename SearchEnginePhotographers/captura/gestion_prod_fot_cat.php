<?php

require_once "../funciones/conexionDB.php";

function setProdFotCat($product_id, $fotografo_id, $categoria_id, $foto_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("INSERT INTO prod_fot_cat(product_id, fotografo_id, categoria_id, foto_id) VALUES ('$product_id', '$fotografo_id', '$categoria_id', '$foto_id')");
    }

    $conexion->close();
}

function updateProdFotCat($product_id, $fotografo_id, $categoria_id, $foto_id, $prodfotcat_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("UPDATE prod_fot_cat SET product_id = '$product_id', fotografo_id = '$fotografo_id', categoria_id = '$categoria_id', foto_id = '$foto_id' WHERE prodfotcat_id = '$prodfotcat_id'");
    }

    $conexion->close();
}