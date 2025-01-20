<?php 

session_start();

require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "Clases/Categoria.php";
require "../captura/gestion_categorias.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {
    if(isset($_POST['nombre_cat']) && $_POST['nombre_cat'] != "") {
        $_POST['nombre_cat'] = trim($_POST['nombre_cat']);

        $categoria = new Categoria(
            "",
            $_POST['nombre_cat'],
            "",
            ""
        );

        setcategoria($categoria);

        header("location: listaCategorias.php");
        exit();
    } else {
        // como no hay nuevo nombre insertado volvemos a la lista
        header("location: listaCategorias.php");
        exit();
    }
} else {
    // como no es administrador, mandamos a la página inicial
    header("location: index.php");
    exit();
}