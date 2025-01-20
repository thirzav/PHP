<?php 

session_start();
        
require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../captura/gestion_clientes.php";
require "../captura/gestion_pedidos.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario") {
    if(isset($_GET['product_id']) && $_GET['product_id'] != "") {
        $product_id = $_GET['product_id'];

        $clientEmail = $_SESSION['validacion']['email'];
        $client_id = getClientId($clientEmail);

        foreach($client_id as $i => $valor) {
            $client_id = $valor;
        }
        $client_id = implode($client_id);

        $numPedidoDB = getPedidosSimple();
        $numPedido = 0;

        foreach($numPedidoDB as $i => $valor) {
            if($valor['num_pedido'] > $numPedido){
                $numPedido = $valor['num_pedido'];
            }
        }
        
        // para que el nuevo número sea el número sucesivo del anterior
        $numPedido = intval($numPedido);
        $numPedido = $numPedido + 1;
        $numPedido = strval($numPedido);

        setPedido($client_id, $product_id, $numPedido);

        header("location: listaPedidos.php");
        exit();
    } else {
        echo "no se ha encontrado el producto que buscaba, el pedido no ha ido bien";
    }
} else {
    header("location: ../index.php");
    exit();
}