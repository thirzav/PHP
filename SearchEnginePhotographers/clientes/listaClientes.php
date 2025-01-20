<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/listaClientes.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>

    <?php 
    session_start();

    include "../header/header.php";
    require "../captura/gestion_clientes.php";
    require_once "Clases/Cliente.php";

    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador"){
    
        $clientesDB = getClientes();
        $clientes = [];

        foreach($clientesDB as $i => $cliente){
            $clientes += [$cliente['client_id'] => new Cliente($cliente['client_id'], $cliente['rol'], $cliente['pass'], $cliente['nombre_c'], $cliente['apellido1_c'], $cliente['apellido2_c'], $cliente['email'], $cliente['telefono'], $cliente['direccion_calle'], $cliente['postcode'], $cliente['ciudad'], $cliente['fecha_crea_c'], $cliente['fecha_mod_c'])];
        } ?>
        
        <div id="div_crear">
            <h2><a href="crearCliente.php">Haz clic aquí</a> para crear una ficha de cliente nuevo</h2>
        </div>

        <div id="container">
            <?php
            foreach($clientes as $i => $cliente){?>
            
            <div class="div_ficha">
            <div>
                    <a href="vercliente.php?client_id=<?php echo $cliente->getClientId() ?>" class="enlace_ficha_cliente">
                        <div class="div_ficha_arriba">
                            <div id="fichaClienteIzquierda">
                                <div class="div_img">
                                    <h2>Client id: <?php echo $cliente->getClientId() ?></h2>
                                </div>
                            </div>
                            <div id="divDerechaInfo">
                                <h2 class="titleNom" id="nombreH2">Nombre:</h2>
                                <p class="detalleCliente"><?php echo $cliente->getNombreC()?></p>
                                <h2 class="titleNom">Apellidos:</h2>
                                <p class="detalleCliente"><?php echo $cliente->getApellido1C() . " " . $cliente->getApellido2C() ?></p>
                            </div>
                        </div>

                    </a>
                </div>

                <div id="fichaClienteAbajo">
                    <a href="vercliente.php?client_id=<?php echo $cliente->getClientId() ?>" class="enlaceVista">
                        <img src="../../img/eye_icon.png" class="imgIcono">
                    </a> 
                    <a href="editarcliente.php?client_id=<?php echo $cliente->getClientId() ?>" class="enlaceVista">
                        <img src="../../img/edit_icon.png" class="imgIcono">
                    </a>
                    <a href="eliminarcliente.php?client_id=<?php echo $cliente->getClientId() ?>" class="enlaceVista">
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