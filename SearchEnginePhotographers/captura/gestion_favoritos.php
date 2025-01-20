<?php 

require_once "../funciones/conexionDB.php";

function setFavorito($client_id, $product_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("INSERT INTO favoritos(client_id, product_id) VALUES ('$client_id','$product_id')");
    }

    $conexion->close();
}