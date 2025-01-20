<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/verCliente.css">
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
    require "../captura/gestion_clientes.php";
    require_once "Clases/Cliente.php";

    if(isset($_SESSION['validacion']) && ($_SESSION['validacion']['rol'] == "administrador" || $_SESSION['validacion']['rol'] == "usuario")){
    
        if(isset($_GET['client_id']) && $_GET['client_id'] != "") {
            $client_id = $_GET['client_id'];

        } else if ($_SESSION['validacion']['rol'] == "usuario") {
            $email = $_SESSION['validacion']['email'];
            $client_id = getClientId($email);

            foreach($client_id as $i => $cvalor){
                $client_id = $cvalor;
            }
            $client_id = implode($client_id);

        }
        
        $clienteDB = getCliente($client_id);

        foreach($clienteDB as $i => $cliente) {
            $cliente = new Cliente($cliente['client_id'], $cliente['rol'], $cliente['pass'], $cliente['nombre_c'], $cliente['apellido1_c'], $cliente['apellido2_c'], $cliente['email'], $cliente['telefono'], $cliente['direccion_calle'], $cliente['postcode'], $cliente['ciudad'], $cliente['fecha_crea_c'], $cliente['fecha_mod_c']);
        }
        ?>

        <div id="container">
            <?php if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario") { ?>
            <nav id="nav_perfil">
                <div id="nav_contenido">
                    <div>
                        <button onclick="mostrarPerfil()" class="nav_enlace">Mi perfil</button>
                    </div>
                    <div>
                        <button onclick="editarPerfil()" class="nav_enlace">Editar perfil</button>
                    </div>
                    <div>
                        <button onclick="cambiarPass()" class="nav_enlace">Cambiar contraseña</button>
                    </div>
                    <div>
                        <button onclick="eliminarPerfil()" class="nav_enlace">Eliminar perfil</button>
                    </div>
                </div>
            </nav>
            <?php } ?>


            <div id="contenido1">
                <div id="contenido_perfil">
                    <div id="div_arriba_titulo">
                        <h1 id="titulo_registrar">Cliente <?php echo $client_id ?></h1>
                    </div>
                    <div id="div_medio">
                        <div>
                            <h3 class="titulo_txtbox">Nombre completo:</h3>
                            <div class="div_input">
                                <input type="text" name="nombreC" id="nombreC" value="<?php echo $cliente->getNombreC()?>" disabled>
                                <label for="nombreC">Nombre</label>     
                            </div>
                            <div id="div_txtbox_nombre">

                                <div class="div_input">
                                    <input type="text" name="apellido1C" id="apellido1C" value="<?php echo $cliente->getApellido1C() ?>" disabled>
                                    <label for="apellido1C">Primer apellido</p>
                                </div>   

                                <div class="div_input">
                                    <input type="text" name="apellido2C" id="apellido2F" value="<?php echo $cliente->getApellido2C() ?>" disabled>
                                    <label for="apellido2C">Segundo apellido</label>
                                </div>  

                            </div>
                        </div>
                    </div>
                    <h2 class="titulo_txtbox">Datos personales:</h2>
                    <div id="div_abajo">
                        <div>
                            <div class="div_input">
                                <h3>Dirección:</h3>
                                <input type="text" name="calle" id="calle" value="<?php echo $cliente->getCalle() ?>" disabled>
                                <label for="calle" id="label_calle">Calle/Avenida/Plaza</label>
                            </div>

                            <div id="div_txtbox_nombre">

                                <div class="div_input">
                                    <input type="text" name="postcode" id="postcode" value="<?php echo $cliente->getPostcode() ?>" disabled>
                                    <label for="postcode">Código Postal</label>
                                </div>   

                                <div class="div_input">
                                    <input type="text" name="ciudad" id="ciudad" value="<?php echo $cliente->getCiudad() ?>" disabled>
                                    <label for="ciudad">Ciudad</label>
                                </div>  
                                
                            </div>
                        </div>
                        <div class="div_input">
                            <h3>Datos de contacto</h3>
                        </div>
                        <div id="div_txtbox_nombre">
                            <div class="div_input">
                                <input type="email" name="email" id="email" value="<?php echo $cliente->getEmail() ?>" disabled>
                                <label for="email">Email</label>
                            </div>
                            <div class="div_input">
                                <input type="telefono" name="telefono" id="telefono" value="<?php echo $cliente->getTelefono() ?>" disabled>
                                <label for="telefono">Número de teléfono</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="contenido2">
                <form action="modCliente.php?client_id=<?php echo $client_id ?>" method="post">
                    <div id="contenido_editar">
                        <div id="div_arriba_titulo">
                            <h1 id="titulo_registrar">Editar</h1>
                        </div>
                        <div id="div_medio">
                            <div>
                                <h3 class="titulo_txtbox">Nombre completo:</h3>
                                <div class="div_input">
                                    <input type="text" name="nombreC" id="nombreC" value="<?php echo $cliente->getNombreC()?>" required>
                                    <label for="nombreC">Nombre</label>     
                                </div>
                                <div id="div_txtbox_nombre">

                                    <div class="div_input">
                                        <input type="text" name="apellido1C" id="apellido1C" value="<?php echo $cliente->getApellido1C()?>" required/>
                                        <label for="apellido1C">Primer apellido</p>
                                    </div>   

                                    <div class="div_input">
                                        <input type="text" name="apellido2C" id="apellido2C" value="<?php echo $cliente->getApellido2C()?>"/>
                                        <label for="apellido2C">Segundo apellido</label>
                                    </div>  

                                </div>
                            </div>
                        </div>
                        <h2 class="titulo_txtbox">Datos personales:</h2>
                        <div id="div_abajo">
                            <div>
                                <div class="div_input">
                                    <h3>Dirección:</h3>
                                    <input type="text" name="calle" id="calle" value="<?php echo $cliente->getCalle()?>" required>
                                    <label for="calle" id="label_calle">Calle/Av./Plaza/Paseo</label>
                                </div>

                                <div id="div_txtbox_nombre">

                                    <div class="div_input">
                                        <input type="text" name="postcode" id="postcode" value="<?php echo $cliente->getPostcode()?>" required>
                                        <label for="postcode">Código Postal</label>
                                    </div>   

                                    <div class="div_input">
                                        <input type="text" name="ciudad" id="ciudad" value="<?php echo $cliente->getCiudad()?>" required>
                                        <label for="ciudad">Ciudad</label>
                                    </div>  
                                    
                                </div>
                            </div>
                            <div class="div_input">
                                <h3>Datos de contacto</h3>
                            </div>
                            <div id="div_txtbox_nombre">
                                <div class="div_input">
                                    <input type="email" name="email" id="email" value="<?php echo $cliente->getEmail()?>" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="div_input">
                                    <input type="telefono" name="telefono" id="telefono" value="<?php echo $cliente->getTelefono()?>">
                                    <label for="telefono">Número de teléfono</label>
                                </div>
                            </div>
                        </div>
                        <div id="div_btn_submit">
                            <input type="submit" id="btn_submit" value="guardar">
                        </div>
                    </div>
                </form>
            </div>

            <div id="contenido3">
                <div id="ficha_cambiarPass">
                        <form action="modPass.php?client_id=<?php echo $client_id ?>" method="post">
                            <h1 class="header_pass">Cambiar contraseña</h1>
                            <label for="oldPass">Contraseña:</label>
                            <input type="password" name="oldPass" id="oldPass">
                            <label for="newPass">Contraseña nueva:</label>
                            <input type="password" name="newPass" id="newPass">
                            <label for="newPassComp">Comprobar contraseña nueva:</label>
                            <input type="password" name="newPassComp" id="newPassComp">
                            <div id="div_btn_submitPass">
                                <input type="submit" id="btn_submitPass" value="guardar">
                            </div>
                        </form>
                </div>
            </div>
            <div id="contenido4">
                <div id="ficha_eliminar">
                    <h1 id="titulo_eliminar">Estás seguro que quieres eliminar tu perfil?</h1>
                    <a href="verCliente.php" class="btn_ficha_eliminar" id="btnVolver">volver</a>
                    <a href="eliminarClienteDB.php?client_id=<?php echo $client_id ?>" class="btn_ficha_eliminar" id="btnEliminar">Eliminar</a> <!-- para pasar por la página que borra el lugar -->
                </div>
            </div>
        </div>
        <script src="JS/verCliente.js"></script>
    <?php 
    } else {
        header("location: ../index.php");
        exit();
    } ?>
    
</body>
</html>