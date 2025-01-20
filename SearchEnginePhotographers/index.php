<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header/header.css">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.jpg">  
    <title>Captura!</title>
</head>
<body>
    <?php 

    session_start();
    
    require "./funciones/functionCookie.php";
    if(isset($_COOKIE['validacion'])) {
        setSessionCookie();
    }

    require "./captura/gestion_index.php";
    require "./categorias/Clases/Categoria.php";
    require "./fotografos/Clases/FotografoCiudad.php";
    include "./header/header.php";
    require "./funciones/calcularPrecios.php";

    
    $categoriasDB = getCategorias();
    $categorias = [];

    foreach($categoriasDB as $i => $categoria) {
        $categorias += [$categoria['categoria_id'] => new Categoria($categoria['categoria_id'], $categoria['nombre_cat'], $categoria['fecha_crea_cat'], $categoria['fecha_mod_cat'])];
    }

    $ciudadesDB = getCiudadDistinta();
    // $ciudadesDB = getCiudadFotografo();
    $ciudades = [];

    foreach($ciudadesDB as $i => $ciudad) {
        array_push($ciudades, $ciudad);
    }

    // para quitar ciudades repetidas
    // $ciudadComp = "";
    // $ciudades = [];

    // foreach($ciudadesAll as $i => $cvalor){
    //     if($cvalor->getCiudadF() != $ciudadComp) {
    //         array_push($ciudades, $cvalor->getCiudadF());
    //         $ciudadComp = $cvalor->getCiudadF();
    //     }
    // }

    // comprobar que $_GET está vacío

    if(count($_GET) == 0) {
        $infoFichaDB = getInfoFicha();
        $infoFicha = [];
        
        foreach($infoFichaDB as $i => $info) {
            array_push($infoFicha, $info);
        }
    } else if ($_GET != "") {
        
        // convertir contenido $_GET en array para poder usarlo
        $filtros = [];

        foreach($_GET as $i => $getvalor){
            array_push($filtros, $getvalor);
        }

        // crear 2 arrays y una variable para hacer sentencias sql
        $tipoFiltroComp = "categoria";
        $filtroCategoria = [];
        $filtroCiudad = [];

        for($i = 0; $i < count($filtros); $i++) {
            if($tipoFiltroComp == "categoria" && !is_numeric($filtros[$i])) {
                array_push($filtroCategoria, $filtros[$i]);
            } else if ($tipoFiltroComp == "categoria" && is_numeric($filtros[$i])) {
                $precio = $filtros[$i];
                $tipoFiltroComp = "ciudad";
            } else if($tipoFiltroComp == "ciudad" && is_string($filtros[$i]) && $filtros[$i] != "filtrar") {
                array_push($filtroCiudad, $filtros[$i]);
            }
        }

        // crear sentencia sql
        $sentenciaCategoria = "SELECT f.fotografo_id, f.nombre_f, f.apellido1_f, f.apellido2_f, f.nombre_empresa, f.ciudad_f, f.descripcion_f, f.telefono_f, f.email_f, pfc.product_id, p.nombre_p, p.descripcion, p.pve, fotos.imagen1, fotos.imagen2, fotos.imagen3, fotos.imagen4, fotos.imagen5 FROM fotografos f LEFT JOIN prod_fot_cat pfc ON f.fotografo_id = pfc.fotografo_id LEFT JOIN productos p ON pfc.product_id = p.product_id LEFT JOIN fotos ON pfc.foto_id = fotos.foto_id INNER JOIN categorias cat ON cat.categoria_id = pfc.categoria_id"; 
        
        if($filtroCategoria == []){
            $sentenciaCategoria = $sentenciaCategoria . " WHERE p.pve BETWEEN 0 AND '$precio'";

            for($i = 0; $i < count($filtroCiudad); $i++){
                if($i == 0) {
                    $sentenciaCategoria = $sentenciaCategoria . " AND f.ciudad_f = '" . $filtroCiudad[$i] . "'";
                } else {
                    $sentenciaCategoria = $sentenciaCategoria . " OR f.ciudad_f = '" . $filtroCiudad[$i] . "'";
                }
            }

                        
            $infoFichaDB = getInfoFichaFiltros($sentenciaCategoria);
            $infoFicha = [];
            
            foreach($infoFichaDB as $i => $info) {
                array_push($infoFicha, $info);
            }

        } else {

            for($i = 0; $i < count($filtroCategoria); $i++){
                if($i == 0) {
                    $sentenciaCategoria = $sentenciaCategoria . " WHERE cat.nombre_cat = '" . $filtroCategoria[$i] . "'";
                } else {
                    $sentenciaCategoria = $sentenciaCategoria . " OR cat.nombre_cat = '" . $filtroCategoria[$i] . "'";
                }
            }
    
            // añadimos filtro precio a la sentencia
            $sentenciaCategoria = $sentenciaCategoria . " AND p.pve BETWEEN 0 AND '$precio'";
    
            // añadir ciudad si hay
            for($i = 0; $i < count($filtroCiudad); $i++){
                if($i == 0) {
                    $sentenciaCategoria = $sentenciaCategoria . " AND f.ciudad_f = '" . $filtroCiudad[$i] . "'";
                } else {
                    $sentenciaCategoria = $sentenciaCategoria . " OR f.ciudad_f = '" . $filtroCiudad[$i] . "'";
                }
            }
            
            $infoFichaDB = getInfoFichaFiltros($sentenciaCategoria);
            $infoFicha = [];
            
            foreach($infoFichaDB as $i => $info) {
                array_push($infoFicha, $info);
            }
        }
    }

    ?>

    <div id="container">

    <!-- barra de filtros -->
        <!-- <div id="div_barra">
            <div id="div_barra_busqueda">
                <input type="text" name="busqueda" id="busqueda">
            </div>

            <div>
                <a href="../fotografos/buscar.php">
                    <img src="img/lupa.png" alt="buscar" id="lupa">
                </a>
            </div>
        </div> -->
        <div>
            <div id="div_filtro">
                <form action="index.php" method="get" id="form_filtro">
                    <div id="filtro_categorias">
                        <div class="filtro_nombre">
                            <h3>Categorias</h3>
                        </div>
                        <div class="filtro_opciones">
                            <?php foreach($categorias as $i => $categoria) { ?>
                                <div class="filtro_opciones_div">
                                    <input type="checkbox" name="<?php echo $categoria->getCategoriaId()?>" id="<?php echo $categoria->getCategoriaId()?>" value="<?php echo $categoria->getNombreCat() ?>">
                                    <label for="<?php $categoria->getCategoriaId() ?>" class="label_opciones"><?php echo $categoria->getNombreCat()?></label>
                                </div>
                            <?php } ?>
                        </div>     
                    </div>

                    <div id="filtro_precio">
                        <div id="filtro_rango_precio">
                            <div class="filtro_nombre">
                                <h3>Precio</h3>
                            </div>
                            <div id="input_precio">
                                <input type="range" name="precio" id="precio" min="0" max="3000">
                            </div>
                        </div>
                    </div>

                    <div id="filtro_ciudad">
                        <div class="filtro_nombre">
                            <h3>Ciudades</h3>
                        </div>
                        <div class="filtro_opciones">
                            <?php for($i = 0; $i < count($ciudades); $i++){ ?>
                                <div class="filtro_opciones_div">
                                    <input type="checkbox" name="<?php echo implode($ciudades[$i])?>" id="<?php echo implode($ciudades[$i])?>" value="<?php echo implode($ciudades[$i]) ?>">
                                    <label for="ciudad<?php echo implode($ciudades[$i])?>" class="label_opciones"><?php echo implode($ciudades[$i])?></label>
                                </div>
                            <?php } ?>
                        </div> 
                    </div>

                    <div>
                        <div id="div_btn_submit">
                            <input type="submit" name="btn_submit" id="btn_submit" value="filtrar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="div_contenido">
            <div>
            <?php foreach($infoFicha as $i => $info) { ?>
                <div class="div_ficha">
                    <div class="container_slider">
                        <div class="slider">
                            <img src="<?php print_r($info['imagen1']) ?>" alt="fotos_empresa" class="slider_img">
                            <img src="<?php print_r($info['imagen2']) ?>" alt="fotos_empresa" class="slider_img">
                            <img src="<?php print_r($info['imagen3']) ?>" alt="fotos_empresa" class="slider_img">
                            <img src="<?php print_r($info['imagen4']) ?>" alt="fotos_empresa" class="slider_img">
                            <img src="<?php print_r($info['imagen5']) ?>" alt="fotos_empresa" class="slider_img">
                        </div>
                        <nav class="nav_galeria">
                            <button class="btn_nav" id="btn_anterior"><img src="../img/anterior.png" class="btn_img"></button>
                            <button class="btn_nav" id="btn_siguiente"><img src="../img/siguiente.png" class="btn_img"></button>
                        </nav>
                    </div>

                    <div class="div_ficha_info">
                        <div>
                            <h3 class="titleh3"><?php echo $info['nombre_empresa'] ?></h3>
                        </div>
                        <div>
                            <p class="p_ficha_info"><i><?php echo $info['ciudad_f'] ?></i></p>
                        </div>
                        <div id="div_descripcion">
                            <p class="p_ficha_info" id="p_descripcion"><?php echo $info['descripcion_f'] ?></p>
                        </div>
                        <div>
                            <p class="p_ficha_info"><strong>a partir de <?php echo precioConIva($info['pve'])?>€</strong></p>
                        </div>
                        <div class="div_btn_ver">
                            <a href="/fotografos/fotografoCat?fotografo_id=<?php echo $info['fotografo_id']?>" class="btn_ver_fotografo">VER MÁS</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <script src="../fotografos/JS/slider.js"></script>      
    <?php include "header/footer.php" ?>
</body>
</html>