<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/editarFotografo.css">
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
    
        if(isset($_GET['fotografo_id']) && $_GET['fotografo_id'] != "") {
            $fotografo_id = $_GET['fotografo_id'];

            $fotografoDB = getFotografo($fotografo_id);

            foreach($fotografoDB as $i => $fvalor) {
                $fotografo = new Fotografo($fvalor['fotografo_id'], $fvalor['nombre_f'], $fvalor['apellido1_f'], $fvalor['apellido2_f'], $fvalor['nombre_empresa'], $fvalor['nif'], $fvalor['direccion_calle_f'], $fvalor['postcode_f'], $fvalor['ciudad_f'], $fvalor['descripcion_f'], $fvalor['foto_perfil'], $fvalor['telefono_f'], $fvalor['email_f'], $fvalor['pass_f'], $fvalor['rol'], $fvalor['fecha_crea_f'], $fvalor['fecha_mod_f']);
            }
        }
        ?>
        
        <div id="contenido2">
            <form action="modFotografo.php?fotografo_id=<?php echo $fotografo_id ?>" method="POST" enctype="multipart/form-data">
                <div id="container2">
                    <div id="div_arriba_titulo">
                        <h1 id="titulo_registrar">Editar perfil</h1>
                    </div>
                    <div id="div_medio1">
                        <div id="div_medio_img_user">
                            <img src="<?php echo $fotografo->getFotoPerfil()?>" alt="" id="img_user">
                            <label for="foto_perfil"></label>
                            <input type="file" name="foto_perfil" id="foto_perfil" value="<?php echo $fotografo->getFotoPerfil() ?>"/>
                            <p class="errorMsg" id="error1">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                            <input type="hidden" name="foto_perfil2" id="foto_perfil2" value="<?php echo $fotografo->getFotoPerfil() ?>"/>
                        </div>
                        <div>
                            <h3 class="titulo_txtbox">Nombre completo:</h3>
                            <div class="div_input">
                                <input type="text" name="nombreF" id="nombreF" value="<?php echo $fotografo->getNombreF()?>" required/>
                                <label for="nombreF">Nombre</label>     
                            </div>
                            <div id="div_txtbox_nombre">

                                <div class="div_input">
                                    <input type="text" name="apellido1F" id="apellido1F" value="<?php echo $fotografo->getApellido1F()?>" required/>
                                    <label for="apellido1F">Primer apellido</p>
                                </div>   

                                <div class="div_input">
                                    <input type="text" name="apellido2F" id="apellido2F" value="<?php echo $fotografo->getApellido2F()?>"/>
                                    <label for="apellido2F">Segundo apellido</label>
                                </div>  

                            </div>
                        </div>

                    </div>
                    <div id="div_medio2">
                        <div>
                            <label for="descripcionF" id="sobreTi"><strong>Sobre ti:</strong></label>
                        </div>
                        <div>
                            <textarea name="descripcionF" id="descripcionF" required><?php echo $fotografo->getDescripcionF()?></textarea>
                        </div>
                    </div>
                    <div id="div_medio3">
                        <div>
                            <h3 class="titulo_txtbox">Datos de la empresa:</h3>
                            <div id="div_txtbox_nombre">

                                <div class="div_input">
                                    <input type="text" id="nombreEmpresa" name="nombreEmpresa" value="<?php echo $fotografo->getNombreEmpresa()?>" required/>
                                    <label for="nombreEmpresa">Nombre empresa</p>
                                </div>   

                                <div class="div_input">
                                    <input type="text" name="nif" id="nif" value="<?php echo $fotografo->getNif()?>" required/>
                                    <label for="nif">NIF</label>
                                </div>  
                                                            
                            </div>
                        </div>
                    </div>
                    <div id="div_medio4">
                        <div>
                            <h3 class="titulo_txtbox">Dirección:</h3>
                            <div class="div_input">
                                <input type="text" name="calle" id="calle" value="<?php echo $fotografo->getCalle()?>" required>
                                <label for="calle" id="label_calle">p.e. Benidorm 24, 4º 2ª</label>
                            </div>

                            <div id="div_txtbox_nombre">

                                <div class="div_input">
                                    <input type="text" name="postcodeF" id="postcodeF" value="<?php echo $fotografo->getPostcodeF()?>" required>
                                    <label for="postcode_f">Código Postal</label>
                                </div>   

                                <div class="div_input">
                                    <input type="text" name="ciudadF" id="ciudadF" value="<?php echo $fotografo->getCiudadF()?>" required>
                                    <label for="ciudadF">Ciudad</label>
                                </div>  
                                        
                            </div>
                        </div>
                        <div>
                            <div class="div_input" id="input_contacto">
                                <h3 class="titulo_txtbox">Datos de contacto</h3>
                            </div>
                            <div id="div_txtbox_nombre">
                                <div id="div_input_emailTel">
                                    <input type="email" name="emailF" id="emailF" value="<?php echo $fotografo->getEmail()?>" required>
                                    <label for="emailF" id="label_email">Email</label>
                                    <input type="telefonoF" name="telefonoF" id="telefonoF" value="<?php echo $fotografo->getTelefonoF()?>">
                                    <label for="telefonoF">Número de teléfono</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="div_abajo">
                        <div id="div_btn_submit">
                            <input type="submit" id="btn_submit" value="Guardar">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    <?php 
    } else {
        header("location: ../index.php");
        exit();
    } ?>
    
</body>
</html>