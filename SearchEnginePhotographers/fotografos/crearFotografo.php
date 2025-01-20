<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/crearFotografo.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>
<?php 
    session_start();
    
    require "../funciones/functionCookie.php";
    if(isset($_COOKIE['validacion'])) {
        setSessionCookie();
    }

    include "../header/header.php";
    require "../captura/gestion_fotografos.php";
    require "Clases/Fotografo.php";

    if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") || !isset($_SESSION['validacion']) ){

    ?>


    <form action="agregarFotografo.php" method="POST" enctype="multipart/form-data">
        <div id="container">
            <div id="div_arriba_titulo">
                <h1 id="titulo_registrar">Registrarse</h1>
            </div>
            <div id="div_medio1">
                <div id="div_medio_img_user">
                    <img src="../img/user_icon.png" alt="" id="img_user">
                    <label for="foto_perfil"></label>
                    <input type="file" name="foto_perfil" id="foto_perfil" required/>
                    <p class="errorMsg" id="error1">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                </div>
                <div>
                    <h3 class="titulo_txtbox">Nombre completo:</h3>
                    <div class="div_input">
                        <input type="text" name="nombreF" id="nombreF" required/>
                        <label for="nombreF">Nombre</label>     
                    </div>
                    <div id="div_txtbox_nombre">

                        <div class="div_input">
                            <input type="text" name="apellido1F" id="apellido1F" required/>
                            <label for="apellido1F">Primer apellido</p>
                        </div>   

                        <div class="div_input">
                            <input type="text" name="apellido2F" id="apellido2F"/>
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
                    <textarea name="descripcionF" id="descripcionF" required></textarea>
                </div>
            </div>
            <div id="div_medio3">
                <div>
                    <h3 class="titulo_txtbox">Contraseña:</h3>
                    <div id="div_txtbox_nombre">

                        <div class="div_input">
                            <input type="password" id="pass" name="pass" required/>
                            <label for="pass">contraseña nuevo</p>
                        </div>   

                        <div class="div_input">
                            <input type="password" name="passComp" id="passComp"/>
                            <label for="passComp">confirmar contraseña</label>
                        </div>  
                                                
                    </div>
                </div>
                <div>
                    <h3 class="titulo_txtbox">Datos de la empresa:</h3>
                    <div id="div_txtbox_nombre">

                        <div class="div_input">
                            <input type="text" id="nombre_empresa" name="nombre_empresa" required/>
                            <label for="nombre_empresa">Nombre empresa</p>
                        </div>   

                        <div class="div_input">
                            <input type="text" name="nif" id="nif" required/>
                            <label for="nif">NIF</label>
                        </div>  
                                                
                    </div>
                </div>
            </div>
            <div id="div_medio4">
                <div>
                    <h3 class="titulo_txtbox">Dirección:</h3>
                    <div class="div_input">
                        <select name="tipo_calle" id="tipo_calle">
                            <option value="Calle">Calle</option>
                            <option value="Avenida">Avenida</option>
                            <option value="Plaza">Plaza</option>
                            <option value="Paseo">Paseo</option>
                        </select>
                        <input type="text" name="calle" id="calle" required>
                        <label for="calle" id="label_calle">p.e. Benidorm 24, 4º 2ª</label>
                    </div>

                    <div id="div_txtbox_nombre">

                        <div class="div_input">
                            <input type="text" name="postcodeF" id="postcodeF" required>
                            <label for="postcode_f">Código Postal</label>
                        </div>   

                        <div class="div_input">
                            <input type="text" name="ciudadF" id="ciudadF" required>
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
                            <input type="email" name="emailF" id="emailF" required>
                            <label for="emailF" id="label_email">Email</label>
                            <input type="telefonoF" name="telefonoF" id="telefonoF">
                            <label for="telefonoF">Número de teléfono</label>
                        </div>
                    </div>
                </div>

            </div>
            <div id="div_abajo">
                <div id="div_btn_submit">
                    <input type="submit" id="btn_submit" value="Registrarse">
                </div>
            </div>
        </div>
    </form>
    <?php 
    } else {
        header("location: ../index.php");
        exit();
    } ?>
    <script src="JS/comprobarImg.js"></script>

</body>
</html>