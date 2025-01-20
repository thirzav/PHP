<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/crearCliente.css">
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

    if(!isset($_SESSION['validacion']) || (isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador")){
    ?>
        <form action="agregarCliente.php" method="post">
            <div id="container">
                <div id="div_arriba_titulo">
                    <h1 id="titulo_registrar">Registrar</h1>
                </div>
                <div id="div_medio">
                    <div>
                        <h3 class="titulo_txtbox">Nombre completo:</h3>
                        <div class="div_input">
                            <input type="text" name="nombreC" id="nombreC" required/>
                            <label for="nombreC">Nombre</label>     
                        </div>
                        <div id="div_txtbox_nombre">

                            <div class="div_input">
                                <input type="text" name="apellido1C" id="apellido1C" required/>
                                <label for="apellido1C">Primer apellido</p>
                            </div>   

                            <div class="div_input">
                                <input type="text" name="apellido2C" id="apellido2C"/>
                                <label for="apellido2C">Segundo apellido</label>
                            </div>  

                        </div>
                    </div>
                    <div>
                        <h3 class="titulo_txtbox">Contraseña:</h3>
                        <div id="div_txtbox_nombre">

                            <div class="div_input">
                                <input type="password" id="pass" name="pass">
                                <label for="pass">contraseña nuevo</p>
                            </div>   

                            <div class="div_input">
                                <input type="password" name="passComp" id="passComp"/>
                                <label>confirmar contraseña</label>
                            </div>  
                                                
                        </div>
                    </div>
                </div>
                <h2 class="titulo_txtbox">Datos personales:</h2>
                <div id="div_abajo">
                    <div>
                        <div class="div_input">
                            <h3>Dirección:</h3>
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
                                <input type="text" name="postcode" id="postcode" required>
                                <label for="postcode">Código Postal</label>
                            </div>   

                            <div class="div_input">
                                <input type="text" name="ciudad" id="ciudad" required>
                                <label for="ciudad">Ciudad</label>
                            </div>  
                            
                        </div>
                    </div>
                    <div class="div_input">
                        <h3>Datos de contacto</h3>
                    </div>
                    <div id="div_txtbox_nombre">
                        <div class="div_input">
                            <input type="email" name="email" id="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="div_input">
                            <input type="telefono" name="telefono" id="telefono">
                            <label for="telefono">Número de teléfono</label>
                        </div>
                    </div>
                </div>
                <div class="div_input">
                    <?php if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador"){ ?>
                        <label for="rol">Tipo de cuenta:</label>
                        <select name="rol" id="rol">
                            <option value="rol">usuario</option>
                            <option value="rol">administrador</option>
                        </select>
                    <?php } ?>
                    <?php if(!isset($_SESSION['validacion'])){ ?>
                        <input type="checkbox" name="recordar" id="recordar" value="recordar">
                        <label for="recordar" id="label_recordar">Recuérdame</label>
                    <?php }?>
                </div>
                <div id="div_btn_submit">
                    <input type="submit" id="btn_submit" value="crear cuenta">
                </div>
            </div>
        </form>
    <?php } else {
        header("location: ../index.php");
        exit();
    } ?>


</body>
</html>