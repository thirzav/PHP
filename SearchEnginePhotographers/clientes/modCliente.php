<?php

session_start();
        
require "../funciones/functionCookie.php";

if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../captura/gestion_clientes.php";
require_once "Clases/Cliente.php";
require "../funciones/comprobaciones.php";

if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") || (isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario")) {
    if (isset($_GET['client_id'])) {
        $client_id = $_GET['client_id'];

        $clienteDB = getCliente($client_id);

        foreach($clienteDB as $i => $cvalor) {
            $clienteDB = $cvalor;
        }

        $_POST['nombreC'] = trim($_POST['nombreC']);
        $nombreComp = comprobarCampoTxt($_POST['nombreC']);
        $_POST['apellido1C'] = trim($_POST['apellido1C']);
        $apellido1Comp = comprobarCampoTxt($_POST['apellido1C']);
        $_POST['apellido2C'] = trim($_POST['apellido2C']);
        $apellido2Comp = comprobarCampoTxt($_POST['apellido2C']);
        $_POST['calle'] = trim($_POST['calle']);
        $_POST['postcode'] = trim($_POST['postcode']);
        $_POST['ciudad'] = trim($_POST['ciudad']);
        $_POST['email'] = trim($_POST['email']);
        $_POST['telefono'] = trim($_POST['telefono']);


        
        if(isset($_POST['nombreC']) && $_POST['nombreC'] != "" && $_POST['nombreC'] != $clienteDB['nombre_c'] && $nombreComp == true) {
            $clienteDB['nombre_c'] = $_POST['nombreC'];
        }

        if(isset($_POST['apellido1C']) && $_POST['apellido1C'] != "" && $_POST['apellido1C'] != $clienteDB['apellido1_c'] && $apellido1Comp == true) {
            $clienteDB['apellido1_c'] = $_POST['apellido1C'];
        }

        if(isset($_POST['apellido2C']) && $_POST['apellido2C'] != "" && $_POST['apellido2C'] != $clienteDB['apellido2_c'] && $apellido2Comp == true) {
            $clienteDB['apellido2_c'] = $_POST['apellido2C'];
        }

        if(isset($_POST['calle']) && $_POST['calle'] != "" && $_POST['calle'] != $clienteDB['direccion_calle']) {
            $clienteDB['direccion_calle'] = $_POST['calle'];
        }

        if(isset($_POST['postcode']) && $_POST['postcode'] != "" && $_POST['postcode'] != $clienteDB['postcode']) {
            $clienteDB['postcode'] = $_POST['postcode'];
        }

        if(isset($_POST['ciudad']) && $_POST['ciudad'] != "" && $_POST['ciudad'] != $clienteDB['ciudad']) {
            $clienteDB['ciudad'] = $_POST['ciudad'];
        }

        if(isset($_POST['email']) && $_POST['email'] != "" && $_POST['email'] != $clienteDB['email']) {
            $clienteDB['email'] = $_POST['email'];
        }


        if(isset($_POST['telefono']) && $_POST['telefono'] != "" && $_POST['telefono'] != $clienteDB['telefono']) {
            $clienteDB['telefono'] = $_POST['telefono'];
        }


        $clienteUpdate = new Cliente (
            $client_id,
            $clienteDB['rol'],
            $clienteDB['pass'],
            $clienteDB['nombre_c'],
            $clienteDB['apellido1_c'],
            $clienteDB['apellido2_c'],
            $clienteDB['email'],
            $clienteDB['telefono'],
            $clienteDB['direccion_calle'],
            $clienteDB['postcode'],
            $clienteDB['ciudad'],
            $clienteDB['fecha_crea_c'],
            $clienteDB['fecha_mod_c']
        );

        updateCliente($clienteUpdate, $client_id);

        if($_SESSION['validacion']['rol'] == "usuario"){
            header("location: verCliente.php");
            exit();
        } else if ($_SESSION['validacion']['rol'] == "administrador") {
            header("location: listaClientes.php");
            exit();
        }

    } else {
        echo "no ha ido bien";
    }


} else {
    header("location: ../index.php");
    exit();
}