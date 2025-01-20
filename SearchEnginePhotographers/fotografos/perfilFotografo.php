<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/perfilFotografo.css">
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
    require_once "Clases/Fotografo.php";
    require "../captura/gestion_pedidos.php";

    if(isset($_SESSION['validacion']) && ($_SESSION['validacion']['rol'] == "administrador" || $_SESSION['validacion']['rol'] == "fotografo")){
    
        if(isset($_GET['fotografo_id']) && $_GET['fotografo_id'] != "") {
            $fotografo_id = $_GET['fotografo_id'];

        } else if ($_SESSION['validacion']['rol'] == "fotografo") {
            $email = $_SESSION['validacion']['email'];
            $fotografo_id = getFotografoId($email);

            foreach($fotografo_id as $i => $cvalor){
                $fotografo_id = $cvalor;
            }
            $fotografo_id = implode($fotografo_id);

        }
        
        $fotografoDB = getFotografo($fotografo_id);

        foreach($fotografoDB as $i => $fotografo) {
            $fotografo = new Fotografo($fotografo['fotografo_id'], $fotografo['nombre_f'], $fotografo['apellido1_f'], $fotografo['apellido2_f'], $fotografo['nombre_empresa'], $fotografo['nif'], $fotografo['direccion_calle_f'], $fotografo['postcode_f'], $fotografo['ciudad_f'], $fotografo['descripcion_f'], $fotografo['foto_perfil'], $fotografo['telefono_f'], $fotografo['email_f'], $fotografo['pass_f'], $fotografo['rol'], $fotografo['fecha_crea_f'], $fotografo['fecha_mod_f']);
        }

        $pedidosDB = getPedidoFotografo($fotografo_id);
        $pedidos = [];

        foreach($pedidosDB as $i => $pedido){
            array_push($pedidos, $pedido);
        }
        ?>

        <div id="container">
            <?php if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "fotografo") { ?>
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

            <div id="contenido3">

            </div>
            
            <div id="contenido4">
                <div id="container3">
                    <div id="div_menu">
                        <div class="menu_info">
                            <h3>Nº pedido</h3>
                        </div>
                        <div class="menu_info">
                            <h3>Fecha</h3>
                        </div>
                        <div class="menu_info">
                            <h3>Cliente</h3>
                        </div>
                        <div class="menu_info">
                            <h3>Empresa</h3>
                        </div>
                        <div class="menu_info">
                            <h3>Total</h3>
                        </div>
                    </div>


                    <?php 
                    $numPedido = 0;

                    foreach($pedidos as $i => $pedido) {
                        
                        if($numPedido != $pedido['num_pedido']){?>
                        <a href="../pedidos/pedido.php?num_pedido=<?php echo $pedido['num_pedido'] ?>" class="enlace_pedido">
                            <div class="div_registro">
                                <p class="registro"><?php echo $pedido['num_pedido'] ?></p>
                                <p class="registro"><?php echo $pedido['fecha_crea_p'] ?></p>
                                <p class="registro"><?php echo $pedido['nombre_c'] . " " . $pedido['apellido1_c'] . " " . $pedido['apellido2_c'] ?></p>
                                <p class="registro"><?php echo $pedido['nombre_empresa'] ?></p>
                                <p class="registro"><?php echo $pedido['pve'] . "€" ?></p>
                            </div>
                        </a>

                        <?php 
                        $numPedido = $pedido['num_pedido'];
                        }
                    } ?>

                </div>

            </div>

            <div id="contenido5">
                <div id="ficha_cambiarPass">
                    <form action="modPass.php?fotografo_id=<?php echo $fotografo_id ?>" method="post">
                        <h1 class="header_pass">Cambiar contraseña</h1>
                        <div id="div_input_pass">
                            <label for="oldPass">Contraseña:</label>
                            <input type="password" name="oldPass" id="oldPass">
                            <label for="newPass">Contraseña nueva:</label>
                            <input type="password" name="newPass" id="newPass">
                            <label for="newPassComp">Comprobar contraseña nueva:</label>
                            <input type="password" name="newPassComp" id="newPassComp">
                        </div>
                        <div id="div_btn_submitPass">
                            <input type="submit" id="btn_submitPass" value="GUARDAR">
                        </div>
                    </form>
                </div>
            </div>
            <div id="contenido6">
                <div id="ficha_eliminar">
                    <h1 id="titulo_eliminar">Estás seguro que quieres eliminar tu perfil?</h1>
                    <a href="perfilFotografo.php?fotografo_id=<?php echo $fotografo_id ?>" class="btn_ficha_eliminar" id="btnVolver">volver</a>
                    <a href="eliminarfotografoDB.php?fotografo_id=<?php echo $fotografo_id ?>" class="btn_ficha_eliminar" id="btnEliminar">Eliminar</a> <!-- para pasar por la página que borra el lugar -->
                </div>
            </div>
        </div>
        <script src="JS/perfilFotografo.js"></script>
    <?php 
    } else {
        header("location: ../index.php");
        exit();
    } ?>
    <script src="JS/comprobarImg.js"></script>
</body>
</html>