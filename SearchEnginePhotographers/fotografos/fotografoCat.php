<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/fotografoCat.css">
    <link rel="stylesheet" type="text/css" href="CSS/slider.css">
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
    require "../captura/gestion_productos.php";
    require "../funciones/calcularPrecios.php";
    
    if(isset($_GET['fotografo_id']) && $_GET['fotografo_id'] != "") {
        $fotografo_id = $_GET['fotografo_id'];
    }

    $infoFicha = getProductosAll($fotografo_id);

    foreach($infoFicha as $i => $valor) {
        $infoFicha = $valor;
    }

?>

    <div id="container">
        <h1 id="nombre_empresa"><?php echo $infoFicha['nombre_empresa'] ?></h1>
        <div class="container_slider">
            <div class="slider">
                <img src="<?php echo$infoFicha['imagen1'] ?>" alt="<?php echo $infoFicha['nombre_foto'] ?>" class="slider_img">
                <img src="<?php echo$infoFicha['imagen2'] ?>" alt="<?php echo $infoFicha['nombre_foto'] ?>" class="slider_img">
                <img src="<?php echo$infoFicha['imagen3'] ?>" alt="<?php echo $infoFicha['nombre_foto'] ?>" class="slider_img">
                <img src="<?php echo$infoFicha['imagen4'] ?>" alt="<?php echo $infoFicha['nombre_foto'] ?>" class="slider_img">
                <img src="<?php echo$infoFicha['imagen5'] ?>" alt="<?php echo $infoFicha['nombre_foto'] ?>" class="slider_img">
            </div>
            <nav class="nav_galeria">
                <button class="btn_nav" id="btn_anterior"><img src="../img/anterior.png" alt="" class="btn_img"></button>
                <button class="btn_nav" id="btn_siguiente"><img src="../img/siguiente.png" alt="" class="btn_img"></button>
            </nav>
        </div>
        <div id="productos">
            <div id="div_arriba">
                <div>
                    <h2>Duración de la sesión:</h2>
                    <p><?php echo $infoFicha['duracion'] ?></p>
                </div>
                <div>
                    <h2>Precio:</h2>
                    <p><?php echo precioConIva($infoFicha['pve'])?>€</p>
                </div>
                <div>
                    <h2>Categoria:</h2>
                    <p><?php echo $infoFicha['nombre_cat']?></p>
                </div>
            </div>
            <div id="div_medio1">
                <p id="p_descripcion"><?php echo $infoFicha['descripcion'] ?></p>
            </div>
            <div id="div_medio2">
                <div>
                    <h2>Datos de contacto</h2>
                    <p><strong>Email: </strong><?php echo $infoFicha['email_f']?></p>
                    <p><strong>Teléfono: </strong><?php echo $infoFicha['telefono_f']?></p>
                </div>
                <div>
                    <h2>Ubicación</h2>
                    <p><?php echo $infoFicha['direccion_calle_f']?></p>
                    <p><?php echo $infoFicha['postcode_f'] . " " . $infoFicha['ciudad_f']?></p>
                </div>
            </div>
            <div id="div_abajo">
                <a href="../favoritos/agregarFavorito.php?fotografo_id=<?php echo $fotografo_id ?>&product_id=<?php echo $infoFicha['product_id']?>" id="enlace_guardar">
                    <img src="../img/icono_guardar.png" id="icono_guardar" alt="guardar">
                </a>
                <a href="../pedidos/hacerPedido.php?product_id=<?php echo $infoFicha['product_id']?>" id="enlace_pedido"><strong>Contratar</strong></a>
            </div>
        </div>

    </div>
    <script src="JS/slider.js"></script>

</body>
</html>