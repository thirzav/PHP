<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/eliminarCliente.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>

    <?php
    session_start();

    include "../header/header.php";
    require "../captura/gestion_clientes.php";

    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {

        if(isset($_GET['client_id'])){

            $client_id = $_GET['client_id'];

            $cliente = getCliente($client_id);

            foreach($cliente as $i => $cvalor) {
                $cliente = $cvalor;
            }

        ?>

            <div id="container">
                <h1>Estás seguro que quieres eliminar el siguiente cliente?</h1>
                <p id="nombre"><strong><?php echo $cliente['nombre_c'] . " " . $cliente['apellido1_c'] . " " . $cliente['apellido2_c'] ?></strong></p>
                <a href="listaClientes.php" id="btnVolver">volver</a>
                <a href="eliminarClienteDB.php?client_id=<?php echo $client_id ?>" id="btnEliminar">Eliminar</a> <!-- para pasar por la página que borra el lugar -->
            </div>

        <?php } else {?>
            <div id="errorMessage">
                <h1>No hay datos, por favor haz clic en el botón para volver</h1>
                <a href="../listaClientes.php">volver</a>
            </div>
        <?php } 
    } else {
        header("location: ../index.php");
        exit();
    }?>
    

</body>
</html>