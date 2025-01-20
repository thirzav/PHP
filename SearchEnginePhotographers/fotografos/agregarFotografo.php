<?php 

session_start();
    
require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../captura/gestion_fotografos.php";
require "Clases/Fotografo.php";
require "../funciones/comprobaciones.php";

if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") || !isset($_SESSION['validacion'])){
  
    // para recoger el formato de la foto
    if(isset($_FILES)){
        $ficheroImagen = $_FILES;
        $fotoPerfil = $_FILES['foto_perfil']['name'];
        $formatoFoto = formatoFoto($fotoPerfil);

        if($formatoFoto == "png" || $formatoFoto == "jpeg" || $formatoFoto == "jpg") {
            $urlImagen = moverFoto($ficheroImagen, $_POST['nombre_empresa'], $formatoFoto);
        }
    }

    // comprobar si campo descripción fotógrafo no está vacío
    if(isset($_POST['descripcionF']) && $_POST['descripcionF'] != "") {
        $descripcion = trim($_POST['descripcionF']);
    }

    if(isset($_POST['nombreF'])) {
        $nombreComp = comprobarCampoTxt($_POST['nombreF']);
        $nombreF = ucfirst($_POST['nombreF']);
        $nombreF = trim($nombreF);
    }

    if(isset($_POST['apellido1F'])) {
        $apellido1Comp = comprobarCampoTxt($_POST['apellido1F']);
        $apellido1F = ucfirst($_POST['apellido1F']);
        $apellido1F = trim($apellido1F);
    }

    if(isset($_POST['apellido2F'])) {
        $apellido2Comp = comprobarCampoTxt($_POST['apellido2F']);
        $apellido2F = ucfirst($_POST['apellido2F']);
        $apellido2F = trim($apellido2F);
    }

    $passTxt = "";

    if(isset($_POST['pass'])) {
        $passComp = true;
        $pass = hash('sha512', $_POST['pass']);
    } else if($_POST['pass'] != $_POST['passComp']) {
        $passComp = false;
        $passTxt = "Las contraseñas no coiciden.";
    } else {
        $pass = false;
    }

    // bajar registros de BBDD para hacer comprobaciones
    $fotografosDB = getFotografos();
    $fotografos = [];

    foreach($fotografosDB as $i => $fotografo){
        $fotografos += [$fotografo['fotografo_id'] => new Fotografo($fotografo['fotografo_id'], $fotografo['nombre_f'], $fotografo['apellido1_f'], $fotografo['apellido2_f'], $fotografo['nombre_empresa'], $fotografo['nif'], $fotografo['direccion_calle_f'], $fotografo['postcode_f'], $fotografo['ciudad_f'], $fotografo['descripcion_f'], $fotografo['foto_perfil'], $fotografo['telefono_f'], $fotografo['email_f'], $fotografo['pass_f'], $fotografo['rol'], $fotografo['fecha_crea_f'], $fotografo['fecha_mod_f'])];
    }

    // comprobar si los datos introducidos son únicos y no constan en la BBDD todavía
    if(isset($_POST['nombre_empresa']) && $_POST['nombre_empresa'] != "" && isset($_POST['nif']) && $_POST['nif'] != "" && isset($_POST['emailF']) && $_POST['emailF'] && isset($_POST['telefonoF']) && $_POST['telefonoF'] != "" ) {
        $empresaComp = true;
        $nifComp = true;
        $emailComp = true;
        $telefonoComp = true;

        foreach($fotografos as $i => $fotografo) {
            if($fotografo->getNombreEmpresa() == $_POST['nombre_empresa']) {
                $empresaTxt = "Este nombre de empresa ya existe";
                $empresaComp = false;
            }

            if($fotografo->getNif() == $_POST['nif']) {
                $nifTxt = "Este NIF ya existe";
                $nifComp = false;
            }

            if($fotografo->getEmail() == $_POST['emailF']) {
                $emailTxt = "Este email ya está registrado";
                $emailComp = false;
            }

            if($fotografo->getTelefonoF() == $_POST['telefonoF']) {
                $telefonoTxt = "Este teléfono ya está registrado";
                $telefonoComp = false;
            }
        }

    } 

    if(isset($_POST['calle']) && $_POST['calle'] != "") {
        $calle = trim($_POST['calle']);
        ucfirst($calle);
    }
    
    if(isset($_POST['postcodeF']) && $_POST['postcodeF'] != "") {
        $postcodeF = trim($_POST['postcodeF']);
        ucfirst($postcodeF);
    }

    if(isset($_POST['ciudadF']) && $_POST['ciudadF'] != "") {
        $ciudadF = trim($_POST['ciudadF']);
        ucfirst($ciudadF);
    }

    if($nombreComp && $apellido1Comp && $apellido2Comp && $passComp && $empresaComp && $nifComp && $emailComp && $telefonoComp) {
        $fotografo = new Fotografo(
            "",
            $nombreF,
            $apellido1F,
            $apellido2F,
            $_POST['nombre_empresa'],
            $_POST['nif'],
            $calle,
            $postcodeF,
            $ciudadF,
            $descripcion,
            $urlImagen,
            $_POST['telefonoF'],
            $_POST['emailF'],
            $pass,
            "fotografo",
            "",
            ""
        );

        setFotografo($fotografo);

        $_SESSION['validacion'] = ['email' => $_POST['emailF'], 'pass' => $pass, 'rol' => 'fotografo'];
            
        // configurar $_COOKIE si hace falta
        if($_POST['recordar'] && $_SESSION['validacion']['rol'] == "usuario"){
            // después setear el cookie en forma de array:
            setcookie("validacion[email]", $_SESSION['validacion']['email'], time() + 3600, '/');
            setcookie("validacion[pass]", $_SESSION['validacion']['pass'], time() + 3600, '/');
            setcookie("validacion[rol]", $_SESSION['validacion']['rol'], time() + 3600, '/');     
        }

        header("location: perfilFotografo.php");
        exit();

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
            echo "Hay que ingreasar una contraseña.";
        }
        
        if(!$empresaComp) {
            echo "Está empresa ya está registrada.";
        }

        if(!$nifComp) {
            echo "Este NIF ya está registrado.";
        }
        
        if(!$emailComp) {
            echo "Este email ya está registrado.";
        }
                
        if(!$telefonoComp) {
            echo "Este teléfono ya está registrado.";
        }

    }

} else {
    header("location: ../index.php");
    exit();
}
