<?php

session_start();

require "../captura/gestion_fotografos.php";
require "Clases/Fotografo.php";
require "../funciones/comprobaciones.php";

if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") || (isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "fotografo")) {
    // para recoger el formato de la foto

    if(isset($_FILES) && $_FILES['foto_perfil']['error'] == 0){
        $ficheroImagen = $_FILES;
        var_dump($_FILES);
        $fotoPerfil = $_FILES['foto_perfil']['name'];
        $formatoFoto = formatoFoto($fotoPerfil);
    
        if($formatoFoto == "png" || $formatoFoto == "jpeg" || $formatoFoto == "jpg") {
            $urlImagen = moverFoto($ficheroImagen, $_POST['nombreEmpresa'], $formatoFoto);
            $urlImagenComp = true;
        }
        
    } else if($_FILES['foto_perfil']['name'] == "") {
        $urlImagenComp = true;
        $urlImagen = $_POST['foto_perfil2'];
    } else {
        $urlImagenComp = false;
    }
    
    if (isset($_GET['fotografo_id'])) {
        $fotografo_id = $_GET['fotografo_id'];

        $fotografoDB = getFotografo($fotografo_id);

        foreach($fotografoDB as $i => $fvalor) {
            $fotografoDB = $fvalor;
        }

        $_POST['nombreF'] = trim($_POST['nombreF']);
        $_POST['apellido1F'] = trim($_POST['apellido1F']);
        $_POST['apellido2F'] = trim($_POST['apellido2F']);
        $_POST['nombreEmpresa'] = trim($_POST['nombreEmpresa']);
        $_POST['nif'] = trim($_POST['nif']);
        $_POST['calle'] = trim($_POST['calle']);
        $_POST['postcodeF'] = trim($_POST['postcodeF']);
        $_POST['ciudadF'] = trim($_POST['ciudadF']);
        $_POST['emailF'] = trim($_POST['emailF']);
        $_POST['telefonoF'] = trim($_POST['telefonoF']);


        
        if(isset($_POST['nombreF']) && $_POST['nombreF'] != "" && $_POST['nombreF'] != $fotografoDB['nombre_f']) {
            $fotografoDB['nombre_f'] = $_POST['nombreF'];
        }

        if(isset($_POST['apellido1F']) && $_POST['apellido1F'] != "" && $_POST['apellido1F'] != $fotografoDB['apellido1_f']) {
            $fotografoDB['apellido1_f'] = $_POST['apellido1F'];
        }

        if(isset($_POST['apellido2F']) && $_POST['apellido2F'] != "" && $_POST['apellido2F'] != $fotografoDB['apellido2_f']) {
            $fotografoDB['apellido2_f'] = $_POST['apellido2F'];
        }

        if(isset($_POST['nombreEmpresa']) && $_POST['nombreEmpresa'] != "" && $_POST['nombreEmpresa'] != $fotografoDB['nombre_empresa']) {
            $fotografoDB['nombre_empresa'] = $_POST['nombreEmpresa'];
        }
        
        if(isset($_POST['nif']) && $_POST['nif'] != "" && $_POST['nif'] != $fotografoDB['nif']) {
            $fotografoDB['nif'] = $_POST['nif'];
        }

        if(isset($_POST['calle']) && $_POST['calle'] != "" && $_POST['calle'] != $fotografoDB['direccion_calle_f']) {
            $fotografoDB['direccion_calle_f'] = $_POST['calle'];
        }

        if(isset($_POST['postcodeF']) && $_POST['postcodeF'] != "" && $_POST['postcodeF'] != $fotografoDB['postcode_f']) {
            $fotografoDB['postcode_f'] = $_POST['postcodeF'];
        }

        if(isset($_POST['ciudadF']) && $_POST['ciudadF'] != "" && $_POST['ciudadF'] != $fotografoDB['ciudad_f']) {
            $fotografoDB['ciudad_f'] = $_POST['ciudadF'];
        }

        if(isset($_POST['descripcionF']) && $_POST['descripcionF'] != "" && $_POST['descripcionF'] != $fotografoDB['descripcion_f']) {
            $fotografoDB['descripcion_f'] = $_POST['descripcionF'];
        }

        if(isset($_POST['emailF']) && $_POST['emailF'] != "" && $_POST['emailF'] != $fotografoDB['email_f']) {
            $fotografoDB['email_f'] = $_POST['emailF'];
        }


        if(isset($_POST['telefonoF']) && $_POST['telefonoF'] != "" && $_POST['telefonoF'] != $fotografoDB['telefono_f']) {
            $fotografoDB['telefono_f'] = $_POST['telefonoF'];
        }

        if($urlImagenComp){
            $fotografoUpdate = new Fotografo (
                $fotografo_id,
                $fotografoDB['nombre_f'],
                $fotografoDB['apellido1_f'],
                $fotografoDB['apellido2_f'],
                $fotografoDB['nombre_empresa'],
                $fotografoDB['nif'],
                $fotografoDB['direccion_calle_f'],
                $fotografoDB['postcode_f'],
                $fotografoDB['ciudad_f'],
                $fotografoDB['descripcion_f'],
                $urlImagen,
                $fotografoDB['telefono_f'],
                $fotografoDB['email_f'],
                $fotografoDB['pass_f'],
                $fotografoDB['rol'],
                $fotografoDB['fecha_crea_f'],
                $fotografoDB['fecha_mod_f']
            );

            updateFotografo($fotografoUpdate, $fotografo_id);

            if($_SESSION['validacion']['rol'] == "fotografo"){
                header("location: perfilFotografo.php");
                exit();
            } else {
                header("location: listaFotografos.php");
                exit();
            }


        } else {
            echo "No se ha podido cargar la imagen, el tamaño máximo es 2MB. Vuelve atrás y elige otra.";
        }
   
    }


} else {
    header("location: ../index.php");
    exit();
}