<?php

session_start();

require "../captura/gestion_clientes.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {

    if(isset($_GET['client_id'])) {
        $client_id = $_GET['client_id'];

        echo $client_id;
        deleteCliente($client_id);

        header("location: listaClientes.php");
        exit();
    } else {
        header("location: listaClientes.php");
        exit();
    }
} else {
    header("location: ../index.php");
    exit();
}
