<?php 

session_start();

require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../captura/gestion_categorias.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {
    if(isset($_GET['categoria_id']) && $_POST['categoria_id'] != "") {
        $categoria_id = $_POST['categoria_id'];

        deletecategoria($categoria_id);

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