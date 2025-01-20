<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/hacerPedido.css">
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
    require "../captura/gestion_clientes.php";

    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario") {
        if(isset($_GET['product_id']) && $_GET['product_id'] != "") {
            $product_id = $_GET['product_id'];

            $producto = getProducto($product_id);
        
            foreach($producto as $i => $pvalor){
                $producto = $pvalor;
            } 

            $clientEmail = $_SESSION['validacion']['email'];
            $client_id = getClientId($clientEmail);

            foreach($client_id as $i => $valor) {
                $client_id = $valor;
            }
            $client_id = implode($client_id);
            $cliente = getCliente($client_id);

            foreach($cliente as $i => $valor) {
                $cliente = $valor;
            }

            
        } else {
            echo "No se ha encontrado el producto que busca.";
        }



    } else {
        header("location: ../clientes/crearCliente.php");
        exit();
    }
    ?>

    <div id="container">
        <div class="div_ficha_producto">
            <div>
                <img src="<?php echo $producto['imagen1'] ?>" alt="" class="img_div_ficha">
            </div>
            <div class="ficha_producto_info">
                <h2><?php echo $producto['nombre_p']?></h2>
                <p><strong>Duración de la sesión: </strong><?php echo $producto['duracion']?></p>
                <p class="producto_descripcion"><?php echo $producto['descripcion']?></p>
            </div>
            <div class="ficha_producto_info">
                <p><strong>Fotógrafo: </strong><?php echo $producto['nombre_f'] . " " . $producto['apellido1_f'] . " " . $producto['apellido2_f']?></p>
                <p><strong>Ciudad: </strong><?php echo $producto['ciudad_f']?></p>
            </div>
        </div>
        <div id="div_datos_cliente">
            <h2>Datos personales</h2>
            <p><strong>Nombre: </strong><?php echo $cliente['nombre_c'] . " " . $cliente['apellido1_c'] . " " . $cliente['apellido2_c']?></p>
            <p><strong>Dirección:</strong><?php echo $cliente['direccion_calle']?></p>
            <p><?php echo $cliente['postcode'] . " " . $cliente['ciudad']?></p>
            <div id="div_datos_abajo">
                <p><strong>Email: </strong><?php echo $cliente['email']?></p>
                <p><strong>Teléfono: </strong><?php echo $cliente['telefono']?></p>
            </div>
        </div>
        <div id="div_precio">
            <div>
                <h2>Precio</h2>
            </div>
            <div id="precio_producto">
                <div>
                    <p id="nombre_p"><strong><?php echo $producto['nombre_p']?></strong></p>
                </div>
                <div>
                    <p id="precio_p"><?php echo $producto['pve']?>€</p>
                </div>
            </div>
            <div id="div_desglose_precio">
                <div>
                    <p><strong>Subtotal: </strong></p>
                    <p><strong>IVA: </strong></p>
                    <p><strong>Total: </strong></p>
                </div>
                <div>
                    <p><?php echo $producto['pve']?>€</p>
                    <p><?php echo calcularIva($producto['pve'])?>€</p>
                    <p><?php echo precioConIva($producto['pve'])?>€</p>
                </div>
            </div>
            <div id="div_enlace_comprar">
                <a href="agregarPedido.php?product_id=<?php echo $product_id?>" id="enlace_pedido">Comprar</a>
            </div>
        </div>
    </div>


</body>
</html>