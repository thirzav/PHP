<?php

session_start();

        
require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../funciones/comprobaciones.php";
require "../captura/gestion_clientes.php";
require_once "Clases/Cliente.php";

if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") || !isset($_SESSION['validacion'])){

    if(isset($_POST)) {
        if(isset($_POST['nombreC'])) {
            $nombreComp = comprobarCampoTxt($_POST['nombreC']);
            $nombre = ucfirst($_POST['nombreC']);
            $nombre = trim($nombre);
        }
    
        if(isset($_POST['apellido1C'])) {
            $apellido1Comp = comprobarCampoTxt($_POST['apellido1C']);
            $apellido1C = ucfirst($_POST['apellido1C']);
            $apellido1C = trim($apellido1C);
        }
    
        if(isset($_POST['apellido2C']) && $_POST['apellido2C'] != "") {
            $apellido2Comp = comprobarCampoTxt($_POST['apellido2C']);
            $apellido2C = ucfirst($_POST['apellido2C']);
            $apellido2C = trim($apellido2C);
        } else if($_POST['apellido2C'] == "") {
            $apellido2Comp = true;
            $apellido2C = "";
        }

        if(isset($_POST['pass']) && $_POST['pass'] != "") {
            $pass = hash('sha512', $_POST['pass']);
            $passComp = true;
        } else {
            $passComp = false;
        }

        // bajar registros de BBDD para hacer comprobaciones
        $clientesDB = getClientes();
        $clientes = [];

        foreach($clientesDB as $i => $cliente){
            $clientes += [$cliente['client_id'] => new Cliente($cliente['client_id'], $cliente['rol'], $cliente['pass'], $cliente['nombre_c'], $cliente['apellido1_c'], $cliente['apellido2_c'], $cliente['email'], $cliente['telefono'], $cliente['direccion_calle'], $cliente['postcode'], $cliente['ciudad'], $cliente['fecha_crea_c'], $cliente['fecha_mod_c'])];
        }

        // comprobar si los datos introducidos son únicos y no constan en la BBDD todavía
        if(isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['telefono']) && $_POST['telefono'] != "") {
            $emailComp = true;
            $telefonoComp = true;

            foreach($clientes as $i => $cliente) {

                if($cliente->getEmail() == $_POST['email']) {
                    $emailTxt = "Este email ya está registrado";
                    $emailComp = false;
                }

                if($cliente->getTelefono() == $_POST['telefono']) {
                    $telefonoTxt = "Este teléfono ya está registrado";
                    $telefonoComp = false;
                }
            }

        } 
        
        if(isset($_POST['calle']) && $_POST['calle'] != "" && isset($_POST['tipo_calle']) && $_POST['tipo_calle'] != "") {
            $calle = trim($_POST['calle']);
            ucfirst($calle);

            $tipoCalle = $_POST['tipo_calle'];

            $calle = $tipoCalle . " " . $calle;
        }
        
        if(isset($_POST['postcode']) && $_POST['postcode'] != "") {
            $postcode = trim($_POST['postcode']);
            ucfirst($postcode);
        }

        if(isset($_POST['ciudad']) && $_POST['ciudad'] != "") {
            $ciudadComp = true;
            $ciudadComp = comprobarCampoTxt($_POST['ciudad']);

            $ciudad = trim($_POST['ciudad']);
            ucfirst($ciudad);
        }

        $rol = "usuario";

        if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {
            $rol = $_POST['rol'];
        }

        if($nombreComp && $apellido1Comp && $apellido2Comp && $passComp && $emailComp && $telefonoComp && $ciudadComp) {
            $cliente = new Cliente(
                "", 
                $rol, 
                $pass, 
                $nombre, 
                $apellido1C, 
                $apellido2C, 
                $_POST['email'], 
                $_POST['telefono'], 
                $calle, 
                $postcode, 
                $ciudad, 
                "", 
                ""
            );
                
            setCliente($cliente);

            if(!isset($_SESSION)) {
                $_SESSION['validacion'] = ['email' => $_POST['email'], 'pass' => $_POST['pass'], 'rol' => 'usuario'];
            
                // configurar $_COOKIE si hace falta
                if($_POST['recordar'] && $_SESSION['validacion']['rol'] == "usuario"){
                    // después setear el cookie en forma de array:
                    setcookie("validacion[email]", $_SESSION['validacion']['email'], time() + 3600, '/');
                    setcookie("validacion[pass]", $_SESSION['validacion']['pass'], time() + 3600, '/');
                    setcookie("validacion[rol]", $_SESSION['validacion']['rol'], time() + 3600, '/');     
                }
    
                header("location: verCliente.php");
                exit();
            } else {
                header("location: listaClientes.php");
                exit();
            }


        } else {
            if(!$nombreComp) {
                echo "El nombre no puede estar vacío y no puede contener números.";
            }
    
            if(!$apellido1Comp) {
                echo "El primer apellido no puede estar vacío y no puede contener números.";
            }
    
            if(!$apellido2Comp) {
                echo "El segundo apellido no puede estar vacío y no puede contener números.";
            }
    
            if(!$passComp) {
                echo "No has puesto una contraseña.";
            }
            
            if(!$emailComp) {
                echo "Este email ya está registrado.";
            }
                    
            if(!$telefonoComp) {
                echo "Este teléfono ya está registrado.";
            }

            if(!$ciudadComp) {
                echo "La ciudad no puede contener números.";
            }
    
        }


    }

}