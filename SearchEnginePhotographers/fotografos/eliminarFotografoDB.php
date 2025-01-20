<?php

session_start();

require "../captura/gestion_fotografos.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {

    if(isset($_GET['fotografo_id'])) {
        $fotografo_id = $_GET['fotografo_id'];

        deleteFotografo($fotografo_id);

        header("location: listaFotografos.php");
        exit();
    } else {
        header("location: ../index.php");
        exit();
    }
} else {
    header("location: ../index.php");
    exit();
}
