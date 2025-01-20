<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/verFotografo.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>

    <?php 
    session_start();

    include "../header/header.php";
    require "../captura/gestion_fotografos.php";
    require "Clases/Fotografo.php";

    if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") || (isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "fotografo")){
    
        if(isset($_GET['fotografo_id']) && $_GET['fotografo_id'] != "") {
            $fotografo_id = $_GET['fotografo_id'];

            $fotografoDB = getFotografo($fotografo_id);

            foreach($fotografoDB as $i => $fvalor) {
                $fotografo = new Fotografo($fvalor['fotografo_id'], $fvalor['nombre_f'], $fvalor['apellido1_f'], $fvalor['apellido2_f'], $fvalor['nombre_empresa'], $fvalor['nif'], $fvalor['direccion_calle_f'], $fvalor['postcode_f'], $fvalor['ciudad_f'], $fvalor['descripcion_f'], $fvalor['foto_perfil'], $fvalor['telefono_f'], $fvalor['email_f'], $fvalor['pass_f'], $fvalor['rol'], $fvalor['fecha_crea_f'], $fvalor['fecha_mod_f']);
            }
        }
        ?>

        <div id="container">
            <div id="div_arriba_titulo">
                <h1><?php echo $fotografo->getNombreF() . " " . $fotografo->getApellido1F() . " " . $fotografo->getApellido2F() ?></h1>
            </div>
            <div id="div_medio">
                <div>
                    <div id="div_medio_img">
                        <img src="<?php echo $fotografo->getFotoPerfil() ?>" alt="imagen de perfil" id="img_perfil">
                    </div>
                </div>
                <div id="div_medio_datosEmpresa">
                    <h2>Datos de empresa:</h2>
                    <p><strong>Nombre: </strong><?php echo $fotografo->getNombreEmpresa() ?></p>
                    <p><strong>NIF: </strong><?php echo $fotografo->getNif() ?></p>
                    <p><?php echo $fotografo->getDescripcionF() ?></p>
                </div>
            </div>
            <div id="div_abajo">
                <div id="div_abajo_izquierda">
                    <h2>Dirección:</h2>
                    <p><?php echo $fotografo->getCalle() ?></p>
                    <p><?php echo $fotografo->getPostcodeF() . " " . $fotografo->getCiudadF() ?></p>
                </div>
                <div id="div_abajo_derecha">
                    <h2>Datos de contacto</h2>
                    <p><strong>Email: </strong><?php echo $fotografo->getEmail() ?></p>
                    <p><strong>Teléfono: </strong><?php echo $fotografo->getTelefonoF() ?></p>
                </div>

            </div>
        </div>
    <?php 
    } else {
        header("location: ../index.php");
        exit();
    } ?>
    
</body>
</html>