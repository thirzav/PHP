<?php

require_once "../funciones/conexionDB.php";

// retorna todos los pedidos con la información del cliente, de la empresa y del producto
function getPedidos() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $pedidos = $conexion->query("SELECT p.*, c.*, prod.*, f.* FROM pedidos p INNER JOIN clientes c ON p.client_id = c.client_id INNER JOIN productos prod ON p.product_id = prod.product_id INNER JOIN prod_fot_cat ON prod_fot_cat.product_id = prod.product_id INNER JOIN fotografos f ON prod_fot_cat.fotografo_id = f.fotografo_id ORDER BY num_pedido");
    }

    return $pedidos;
    $conexion->close();
}

// retorna solo los datos de la tabla intermedia
function getPedidosSimple() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $pedidos = $conexion->query("SELECT * FROM pedidos");
    }

    return $pedidos;
    $conexion->close();
}

// retorna 1 pedido con la información del cliente, la empresa y el producto
function getPedido($numPedido) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $pedido = $conexion->query("SELECT p.*, c.*, prod.*, f.* FROM pedidos p INNER JOIN clientes c ON p.client_id = c.client_id INNER JOIN productos prod ON p.product_id = prod.product_id INNER JOIN prod_fot_cat ON prod_fot_cat.product_id = prod.product_id INNER JOIN fotografos f ON prod_fot_cat.fotografo_id = f.fotografo_id WHERE p.num_pedido = '$numPedido'");
    }

    return $pedido;
    $conexion->close();
}

// pasamos email (que es único) y retorna todos los pedidos del cliente
function getPedidoCliente($client_id) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $pedido = $conexion->query("SELECT p.*, c.*, prod.*, f.* FROM pedidos p INNER JOIN clientes c ON p.client_id = c.client_id INNER JOIN productos prod ON p.product_id = prod.product_id INNER JOIN prod_fot_cat ON prod_fot_cat.product_id = prod.product_id INNER JOIN fotografos f ON prod_fot_cat.fotografo_id = f.fotografo_id WHERE p.client_id = '$client_id'");
    }

    return $pedido;
    $conexion->close();
}

// pasamos email (que es único) y retorna todos los pedidos del cliente
function getPedidoFotografo($fotografo_id) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $pedido = $conexion->query("SELECT p.*, c.*, prod.*, f.* FROM pedidos p INNER JOIN clientes c ON p.client_id = c.client_id INNER JOIN productos prod ON p.product_id = prod.product_id INNER JOIN prod_fot_cat ON prod_fot_cat.product_id = prod.product_id INNER JOIN fotografos f ON prod_fot_cat.fotografo_id = f.fotografo_id WHERE f.fotografo_id = '$fotografo_id'");
    }

    return $pedido;
    $conexion->close();
}

// para crear un registro nuevo en la tabla
function setPedido($client_id, $product_id, $num_pedido) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("INSERT INTO pedidos(client_id, product_id, num_pedido) VALUES ('$client_id', '$product_id', '$num_pedido')");
    }

    $conexion->close();
}