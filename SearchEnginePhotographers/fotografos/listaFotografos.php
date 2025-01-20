<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/listaFotografos.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>

    <?php 
    session_start();

    include "../header/header.php";
    require "../captura/gestion_fotografos.php";
    require "Clases/Fotografo.php";

    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador"){
    
        $fotografosDB = getFotografos();
        $fotografos = [];

        foreach($fotografosDB as $i => $fotografo){
            $fotografos += [$fotografo['fotografo_id'] => new Fotografo($fotografo['fotografo_id'], $fotografo['nombre_f'], $fotografo['apellido1_f'], $fotografo['apellido2_f'], $fotografo['nombre_empresa'], $fotografo['nif'], $fotografo['direccion_calle_f'], $fotografo['postcode_f'], $fotografo['ciudad_f'], $fotografo['descripcion_f'], $fotografo['foto_perfil'], $fotografo['telefono_f'], $fotografo['email_f'], $fotografo['pass_f'], $fotografo['rol'], $fotografo['fecha_crea_f'], $fotografo['fecha_mod_f'])];
        } ?>
        
        <div id="div_crear">
            <h2><a href="crearFotografo.php">Haz clic aquí</a> para crear una ficha de fotógrafo nuevo</h2>
        </div>

        <div id="container">
            <?php
            foreach($fotografos as $i => $fotografo){?>
            
            <div class="div_ficha">
            <div>
                    <a href="perfilFotografo.php?fotografo_id=<?php echo $fotografo->getFotografoId() ?>" class="enlace_ficha_fotografo">
                        <div class="div_ficha_arriba">
                            <div id="fichaFotografoIzquierda">
                                <div class="div_img">
                                    <img src="<?php echo $fotografo->getFotoPerfil() ?>" alt="img_fotografo" class="img_fotografo">
                                </div>
                            </div>
                            <div id="divDerechaInfo">
                                <h2 class="titleNom" id="nombreH2">Nombre:</h2>
                                <p class="detalleFotografo"><?php echo $fotografo->getNombreF()?></p>
                                <h2 class="titleNom">Apellidos:</h2>
                                <p class="detalleFotografo"><?php echo $fotografo->getApellido1F() . " " . $fotografo->getApellido2F() ?></p>
                            </div>
                        </div>

                    </a>
                </div>

                <div id="fichaFotografoAbajo">
                    <a href="verFotografo.php?fotografo_id=<?php echo $fotografo->getFotografoId() ?>" class="enlaceVista">
                        <img src="../../img/eye_icon.png" class="imgIcono">
                    </a> 
                    <a href="editarFotografo.php?fotografo_id=<?php echo $fotografo->getFotografoId() ?>" class="enlaceVista">
                        <img src="../../img/edit_icon.png" class="imgIcono">
                    </a>
                    <a href="eliminarFotografo.php?fotografo_id=<?php echo $fotografo->getFotografoId() ?>" class="enlaceVista">
                        <img src="../../img/delete_icon.png" class="imgIcono">                                    
                    </a>


                </div>
            </div>

            <?php } ?>
        </div>
    <?php 
    } else {
        header("location: ../index.php");
        exit();
    } ?>
    
</body>
</html>