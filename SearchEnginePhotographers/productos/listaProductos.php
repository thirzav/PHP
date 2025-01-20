<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/listaProductos.css">
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
    require "../captura/gestion_productos.php";
    require "../funciones/calcularPrecios.php";
    require "../captura/gestion_fotografos.php";
    
    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {
        $productosDB = getProductos();
        $productos = [];
    
        foreach($productosDB as $i => $producto){
            array_push($productos, $producto);
        } 
    } else if (isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "fotografo") {
        $email = $_SESSION['validacion']['email'];
        $fotografo_id = getFotografoId($email);

        foreach($fotografo_id as $i => $fvalor){
            $fotografo_id = $fvalor;
        }
        $fotografo_id = implode($fotografo_id);

        $productosDB = getProductosAll($fotografo_id);
        $productos = [];
    
        foreach($productosDB as $i => $producto){
            array_push($productos, $producto);
        } 
    } else {
        header("location: ../index.php");
        exit();
    }

          
    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == ("administrador" || "fotografo")){ ?>
        <div id="div_crear">
            <h2><a href="crearProducto.php">Haz clic aquí</a> para crear un producto nuevo</h2>
        </div>
    <?php } ?>

        <div id="container">
            <?php
            foreach($productos as $i => $producto){?>
                <div class="div_ficha_producto">
                    <div>
                        <img src="<?php echo $producto['imagen1'] ?>" alt="" class="img_div_ficha">
                    </div>
                    <div class="ficha_producto_info">
                        <h2><?php echo $producto['nombre_p']?></h2>
                        <p><strong>Duración de la sesión: </strong><?php echo $producto['duracion']?></p>
                        <p><strong>Precio: </strong><?php echo precioConIva($producto['pve'])?>€</p>
                        <p class="producto_descripcion"><?php echo $producto['descripcion']?></p>
                    </div>
                    <div class="ficha_producto_info">
                        <p><strong>Fotógrafo: </strong><?php echo $producto['nombre_f'] . " " . $producto['apellido1_f'] . " " . $producto['apellido2_f']?></p>
                        <p><strong>Ciudad: </strong><?php echo $producto['ciudad_f']?></p>
                    </div>
                    <div class="div_btn_redirigir">
                        <a href="editarProducto.php?product_id=<?php echo $producto['product_id'] ?>" class="enlace_edit_icon">
                            <img src="../img/edit_icon.png" class="edit_icon" alt="">
                        </a>
                        <a href="../fotografos/fotografoCat?fotografo_id=<?php echo $producto['fotografo_id']?>" class="btn_ver_fotografo">VER MÁS</a> <!-- conecta con la ficha que contiene toda la información (fotógrafo, fotos, productos) -->
                    </div>
                </div>
            <?php } ?>
        </div>
                
</body>
</html>