<?php

session_start();
        
require "../funciones/functionCookie.php";

if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../captura/gestion_clientes.php";

if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") || (isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario")) {
    if (isset($_GET['client_id']) && isset($_POST['oldPass']) && $_POST['oldPass'] != "" && isset($_POST['newPass']) && $_POST['newPass'] != "" &&  isset($_POST['newPassComp']) && $_POST['newPassComp'] != "") {
        $client_id = $_GET['client_id'];
        $_POST['oldPass'] = hash('sha512', $_POST['oldPass']);

        if($_SESSION['validacion']['pass'] == $_POST['oldPass']){
            $oldPassComp = true;
        } else {
            $oldPassComp = false;
        }

        if($_POST['newPass'] == $_POST['newPassComp']) {
            $newPassComp = true;
            $pass = hash('sha512', $_POST['newPass']);
        } else {
            $newPassComp = false;
        }
        
        if($oldPassComp && $newPassComp) {
            updatePass($pass, $client_id);

            header("location: verCliente.php");
            exit();
        } else {
            if($oldPassComp == false) {
                echo "La contraseña antigua es incorrecta";
            }

            if($newPassComp == false) {
                echo "La comprobación de contraseña es incorrecta, las contraseñas no coinciden.";
            }
        }

    } else {
        echo "no ha ido bien";
    }


} else {
    header("location: ../index.php");
    exit();
}