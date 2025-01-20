<?php

session_start();
    
require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../captura/gestion_categorias.php";
require "Clases/Categoria.php";
require "../funciones/comprobaciones.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {
    if (isset($_POST['categoria_id'])) {
        $categoria_id = $_POST['categoria_id'];

        $categoriaDB = getCategoria($categoria_id);

        foreach($categoriaDB as $i => $cvalor) {
            $categoriaDB = $cvalor;
        }

        var_dump($_POST);

        $_POST['nombreCat'] = trim($_POST['nombreCat']);
        $nombreComp = comprobarCampoTxt($_POST['nombreCat']);

        if(isset($_POST['nombreCat']) && $_POST['nombreCat'] != "" && $_POST['nombreCat'] != $categoriaDB['nombre_cat'] && $nombreComp == true) {
            $categoriaDB['nombre_cat'] = $_POST['nombreCat'];
        }

        $categoriaUpdate = new Categoria (
            $categoria_id,
            $categoriaDB['nombre_cat'],
            $categoriaDB['fecha_crea_cat'],
            ""
        );

        updateCategoria($categoriaUpdate, $categoria_id);

        header("location: listaCategorias.php");
        exit();
    } else {
        if($nombreComp == false) {
            echo "El nombre proporcionado no puede contener números";
        }
    }


} else {
    header("location: ../index.php");
    exit();
}