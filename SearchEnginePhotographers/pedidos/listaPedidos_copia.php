    <?php

    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador"){
        $pedidosDB = getPedidos();
        $pedidos = [];

        foreach($pedidosDB as $i => $pedido) {
            array_push($pedidos, $pedido);
        }
     } else if ((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "fotografo")) {
        $email = $_SESSION['validacion']['email'];
        $fotografo_id = getFotografoId($email);

        foreach($fotografo_id as $i => $fidvalor){
            $fotografo_id = $fidvalor;
        }
        
        // convertir array en string
        $fotografo_id = implode($fotografo_id);

        $pedidosDB = getPedidoFotografo($fotografo_id);
        $pedidos = [];

        foreach($pedidosDB as $i => $pedido){
            array_push($pedidos, $pedido);
        }
    }
    ?>

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
            <a href="pedido.php?num_pedido=<?php echo $pedido['num_pedido'] ?>" class="enlace_pedido">
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
