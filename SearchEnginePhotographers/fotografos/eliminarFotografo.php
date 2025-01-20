<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/eliminarFotografo.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>

    <?php
    session_start();

    include "../header/header.php";
    require "../captura/gestion_fotografos.php";

    if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador") {

        if(isset($_GET['fotografo_id'])){

            $fotografo_id = $_GET['fotografo_id'];

            $fotografo = getFotografo($fotografo_id);

            foreach($fotografo as $i => $fvalor) {
                $fotografo = $fvalor;
            }

        ?>

            <div id="container">
                <h1>Estás seguro que quieres eliminar el siguiente fotógrafo?</h1>
                <p id="nombre"><strong><?php echo $fotografo['nombre_f'] . " " . $fotografo['apellido1_f'] . " " . $fotografo['apellido2_f'] ?></strong></p>
                <a href="listaFotografos.php" id="btnVolver">volver</a>
                <a href="eliminarFotografoDB.php?fotografo_id=<?php echo $fotografo_id ?>" id="btnEliminar">Eliminar</a> <!-- para pasar por la página que borra el lugar -->
            </div>

        <?php } else {?>
            <div id="errorMessage">
                <h1>No hay datos, por favor haz clic en el botón para volver</h1>
                <a href="../index.php">volver</a>
            </div>
        <?php } 
    } else {
        header("location: listaFotografos.php");
        exit();
    }?>
    

</body>
</html>