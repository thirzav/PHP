<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/editarCliente.css">
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

    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador"){
    
        if(isset($_GET['client_id']) && $_GET['client_id'] != "") {
            $client_id = $_GET['client_id'];

            $clienteDB = getCliente($client_id);

            foreach($clienteDB as $i => $cliente) {
                $cliente = new Cliente($cliente['client_id'], $cliente['rol'], $cliente['pass'], $cliente['nombre_c'], $cliente['apellido1_c'], $cliente['apellido2_c'], $cliente['email'], $cliente['telefono'], $cliente['direccion_calle'], $cliente['postcode'], $cliente['ciudad'], $cliente['fecha_crea_c'], $cliente['fecha_mod_c']);
            }
        }
        ?>
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
                    <div id="div_titulo_cuenta">
                        <h3 class="titulo_txtbox" id="titulo_cuenta">Cuenta</h3>
                    </div>
                    <label id="label_rol" for="rol">Tipo de cuenta:</label>
                        <select name="rol" id="rol">
                            <option value=""><?php echo $cliente->getRol()?></option>
                            <?php if($cliente->getRol() == "administrador") { ?>
                                <option value="rol">usuario</option>
                            <?php } else { ?>
                                <option value="rol">administrador</option>
                            <?php } ?>
                        </select>
                    <div id="div_btn_submit">
                        <input type="submit" id="btn_submit" value="guardar">
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