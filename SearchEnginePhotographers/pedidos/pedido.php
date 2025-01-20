<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/pedido.css">
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
    require "../captura/gestion_pedidos.php";
    require "../funciones/calcularPrecios.php";

    if(isset($_GET['num_pedido'])) {
        $numPedido = $_GET['num_pedido'];

        $pedidoDB = getPedido($numPedido);
        $pedido = [];

        // poner productos en array, porque 1 pedido puede tener más de 1 producto
        foreach($pedidoDB as $i => $producto){
            array_push($pedido, $producto);
        }

    }
    ?>

    <div id="container">
        <div id="div_datos_cliente">
            <h1>Datos del cliente:</h1>
            <p class="p_datos">Nombre: <?php echo $pedido[0]['nombre_c'] . " " . $pedido[0]['apellido1_c'] . " " . $pedido[0]['apellido2_c'] ?></p>
            <p class="p_datos">Dirección: <?php echo $pedido[0]['direccion_calle'] ?></p>
            <p class="p_datos"><?php echo $pedido[0]['postcode'] . " " . $pedido[0]['ciudad'] ?></p>
            <p class="p_datos">Email: <?php echo $pedido[0]['email']?></p>
            <p class="p_datos">Teléfono: <?php echo $pedido[0]['telefono'] ?></p>
        </div>
        <div id="div_datos_empresa">
            <h1>Datos de la empresa:</h1>
            <p class="p_datos">Nombre: <?php echo $pedido[0]['nombre_empresa'] ?></p>
            <p class="p_datos">NIF: <?php echo $pedido[0]['nif'] ?></p>
            <p class="p_datos">Dirección: <?php echo $pedido[0]['direccion_calle_f'] ?></p>
            <p class="p_datos"><?php echo $pedido[0]['postcode_f'] . " " . $pedido[0]['ciudad_f'] ?></p>
            <p class="p_datos">Email: <?php echo $pedido[0]['email_f']?></p>
            <p class="p_datos">Teféfono: <?php echo $pedido[0]['telefono_f'] ?></p>
        </div>
        <div id="div_datos_pedido">
            <h1>Fecha: <?php echo $pedido[0]['fecha_crea_p'] ?></h1>
            <div id="header_pedidos">
                <p class="nombre_registros">Producto</p>
                <p class="nombre_registros">Cantidad</p>
                <p class="nombre_registros">Precio</p>
                <p class="nombre_registros">Total</p>
            </div>
            <?php 

            $productoComp = "";
            $subTotal = 0;

            foreach($pedido as $i => $producto) {
                $cantidad = 0;
                ?>
            
                <div id="div_registros">
                <?php
                if($producto['nombre_p'] != $productoComp){
                    $productoComp = $producto['nombre_p'];
                ?>
                    <p class="registro_producto"><?php echo $producto['nombre_p'] ?></p>
                    <?php foreach($pedido as $i => $pvalor) {
                        if($pvalor['nombre_p'] == $productoComp) {
                        $cantidad = $cantidad +1;
                        } 
                    }
                    $precio = $cantidad * $producto['pve'];
                    ?>
                    <p class="registro_producto derecha"><?php echo $cantidad?></p>
                    <p class="registro_producto derecha"><?php echo $producto['pve'] ?></p>
                    <p class="registro_producto derecha"><?php echo $precio ?></p>
                </div>

            <?php
                }
                $subTotal = $subTotal + $precio;

            } ?>
        </div>
        <div id="div_total">
            <div></div>
            <div></div>
            <div class="div_precios">
                <p>Subtotal:</p>
                <p>IVA 21%:</p>
                <p class="precio_total"><strong>Total:</strong></p>
            </div>
            <div class="div_precios">
                <p><?php echo $subTotal ?>€</p>
                <p><?php echo calcularIva($subTotal) ?>€</p>
                <p class="precio_total"><strong><?php echo $subTotal ?>€</strong></p>
            </div>
        </div>
    </div>
    
</body>
</html>