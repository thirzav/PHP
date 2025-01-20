<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/categoria.css">
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
    
    if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario") || !isset($_SESSION['validacion'])){

        include "../header/header.php";
        require "../captura/gestion_fotografos.php";

        if(isset($_GET['categoria_id']) && $_GET['categoria_id'] != ""){
            $categoria_id = $_GET['categoria_id'];
            $infoFichaDB = getInfoFichaConId($categoria_id);
            $infoFicha = [];
            
            foreach($infoFichaDB as $i => $info) {
                array_push($infoFicha, $info);
            }

            ?>

            <div id="container">
                <div id="div_contenido">
                    <div>
                    <?php foreach($infoFicha as $i => $info) { ?>
                        <div class="div_ficha">
                            <div class="div_ficha_fotografo">
                                <img src="<?php print_r($info['imagen1']) ?>" alt="" class="img_div_ficha">
                            </div>
                            <div>
                                <h3 class="titleh3"><?php echo $info['nombre_empresa'] ?></h3>
                                <p><i><?php echo $info['ciudad_f'] ?></i></p>
                                <p><?php echo $info['descripcion_f'] ?></p>
                                <p><strong>a partir de <?php echo $info['pve']?>€</strong></p>
                                <div class="div_btn_ver">
                                    <a href="/fotografos/fotografoCat?fotografo_id=<?php echo $info['fotografo_id']?>" class="btn_ver_fotografo">VER MÁS</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        header("location: listaCategorias.php");
        exit();
    } ?>
</body>
</html>