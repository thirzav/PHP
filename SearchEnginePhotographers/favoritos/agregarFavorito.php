<?php 

session_start();
        
require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario") {

    require "../captura/gestion_favoritos.php"; 
    require "../captura/gestion_clientes.php";

    if(isset($_GET['product_id']) && $_GET['product_id'] != "") {
        $product_id = $_GET['product_id'];
    }

    $email = $_SESSION['validacion']['email'];
    $client_id = getClientId($email);

    foreach($client_id as $i => $valor) {
        $client_id = $valor['email'];
    }
    var_dump($client_id);


    implode($client_id);

    setFavorito($client_id, $product_id);

    header("location: ../fotografos/listaFotografos.php");
    exit();

} else if(!isset($_SESSION['validacion'])) {
    echo "Tiene que registrarse para poder guardar un producto como favorito.";
}