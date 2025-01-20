<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/editarProducto.css">
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
    require "../captura/gestion_fotografos.php";
    require "../fotografos/Clases/Fotografo.php";
    require "../captura/gestion_categorias.php";
    require "../categorias/Clases/Categoria.php";
    require "../funciones/calcularPrecios.php";

    // datos del producto
    if (isset($_GET['product_id']) && $_GET['product_id'] != ""){

        // categorias para desplegable categorias
        $categoriasDB = getCategorias();
        $categorias = [];

        foreach($categoriasDB as $i => $categoria){
            $categorias += [$categoria['categoria_id'] => new Categoria($categoria['categoria_id'], $categoria['nombre_cat'], $categoria['fecha_crea_cat'], $categoria['fecha_mod_cat'])];
        }   
        
        // fotografos para desplegable fotógrafos
        $fotografosDB = getFotografos();
        $fotografos = [];

        foreach($fotografosDB as $i => $fotografo){
            $fotografos += [$fotografo['fotografo_id'] => new Fotografo($fotografo['fotografo_id'], $fotografo['nombre_f'], $fotografo['apellido1_f'], $fotografo['apellido2_f'], $fotografo['nombre_empresa'], $fotografo['nif'], $fotografo['direccion_calle_f'], $fotografo['postcode_f'], $fotografo['ciudad_f'], $fotografo['descripcion_f'], $fotografo['foto_perfil'], $fotografo['telefono_f'], $fotografo['email_f'], $fotografo['pass_f'], $fotografo['rol'], $fotografo['fecha_crea_f'], $fotografo['fecha_mod_f'])];
        }

        $product_id = $_GET['product_id'];
        $producto = getProducto($product_id);

        foreach($producto as $i => $pvalor) {
            $producto = $pvalor;
        }

        ?>
        
        <?php if(isset($_SESSION['validacion']['rol']) && $_SESSION['validacion']['rol'] == ("fotografo" || "administrador")) { ?>
            <div id="container">
                <form action="modProducto.php?product_id=<?php echo $product_id?>" id="formulario_producto" method="post" enctype="multipart/form-data">
                    <div id="contenido_container">
                        <div class="div_contenido">
                            <h1 id="titulo_crear">Crear producto nuevo:</h1>
                            <label for="nombre_p" class="labels">Nombre del producto:</label>
                            <input type="text" name="nombre_p" id="nombre_p" value="<?php echo $producto['nombre_p'] ?>" required>
                        </div>
                        <div class="div_contenido">
                            <label for="fotos" class="labels">Fotos:</label>
                            <label for="nombre_foto" class="labels">Nombre carpeta de fotos:</label>
                            <input type="text" name="nombre_foto" id="nombre_foto" value="<?php echo $producto['nombre_foto'] ?>">
                            <input type="hidden" name="foto_id" id="foto_id" value="<?php echo $producto['foto_id']?>">

                            <div id="div_input_img">
                                <div>
                                    <img src="<?php echo $producto['imagen1'] ?>" alt="imagen1">
                                    <input type="file" name="imagen1" id="imagen1" class="input_img">
                                    <input type="hidden" name="oldImagen1" id="oldImagen1" value="<?php echo $producto['imagen1'] ?>">
                                    <p class="errorMsg" id="error1">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                                    <img src="<?php echo $producto['imagen2'] ?>" alt="imagen2">
                                    <input type="file" name="imagen2" id="imagen2" class="input_img">
                                    <input type="hidden" name="oldImagen2" id="oldImagen2" value="<?php echo $producto['imagen2'] ?>">
                                    <p class="errorMsg" id="error2">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                                    <img src="<?php echo $producto['imagen3'] ?>" alt="imagen3">
                                    <input type="file" name="imagen3" id="imagen3" class="input_img">
                                    <input type="hidden" name="oldImagen3" id="oldImagen3" value="<?php echo $producto['imagen3'] ?>">
                                    <p class="errorMsg" id="error3">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                                </div>
                                <div>
                                    <img src="<?php echo $producto['imagen4'] ?>" alt="imagen4">
                                    <input type="file" name="imagen4" id="imagen4" class="input_img">
                                    <input type="hidden" name="oldImagen4" id="oldImagen4" value="<?php echo $producto['imagen4'] ?>">
                                    <p class="errorMsg" id="error4">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                                    <img src="<?php echo $producto['imagen5'] ?>" alt="imagen5">
                                    <input type="file" name="imagen5" id="imagen5" class="input_img">
                                    <input type="hidden" name="oldImagen5" id="oldImagen5" value="<?php echo $producto['imagen5'] ?>">    
                                    <p class="errorMsg" id="error5">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>                    
                                </div>
                            </div>
                        </div>
                        <div class="div_contenido" id="contenido_categoria_duracion">
                            <div>
                                <label for="categoria_id" class="labels">Categoria</label>
                                <select name="categoria_id" id="categoria_id">
                                    <option value=""><?php echo $producto['nombre_cat'] ?></option>
                                    <?php foreach($categorias as $i => $categoria) { ?>
                                        <option value="<?php echo $categoria->getCategoriaId() ?>"><?php echo $categoria->getNombreCat()?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label for="duracion" class="labels">Duración de la sesión:</label>
                                <input type="text" name="duracion" id="duracion" value="<?php echo $producto['duracion'] ?>">
                            </div>
                        </div>
                        <div class="div_contenido">
                            <label for="descripcion" class="labels">Descripción del producto:</label>
                            <textarea name="descripcion" id="descripcion"><?php echo $producto['descripcion'] ?></textarea>
                        </div>
                        <div class="div_contenido">
                            <div id="div_precio">
                                <div>
                                    <label for="pve" class="labels">Precio en € (sin IVA)</label>
                                    <input type="number" name="pve" id="pve" value="<?php echo $producto['pve'] ?>">
                                </div>
                                <div>
                                    <h4 class="titulo_iva" class="labels">IVA</h4>
                                    <p class="num_iva"><?php echo calcularIva($producto['pve']) ?></p>
                                </div>
                                <div>
                                    <h4 class="titulo_iva" class="labels">Precio con IVA</h4>
                                    <p class="num_iva"><?php echo precioConIva($producto['pve']) ?></p>
                                </div>
                            </div>
                            <?php if(isset($_SESSION['validacion']['rol']) && $_SESSION['validacion']['rol'] == "administrador") { ?>
                                <div id="div_fotografos">
                                    <label for="fotografo" class="labels">Fotógrafo:</label>
                                    <input type="hidden" name="fotografo_id_old" id="fotografo_id_old" value="<?php echo $producto['categoria_id']?>">
                                    <select name="fotografo" id="fotografo">
                                        <option value=""><?php echo $producto['nombre_f'] . " " . $producto['apellido1_f'] . " " . $producto['apellido2_f']?></option>
                                        <?php foreach($fotografos as $i => $fotografo) { ?>
                                        <option value="<?php echo $fotografo->getFotografoId() ?>"><?php echo $fotografo->getNombreF() . " " . $fotografo->getApellido1F() . " " . $fotografo->getApellido2F()?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="div_contenido" id="div_contenido_submit">
                            <input type="submit" name="btn_submit" id="btn_submit" onclick="validarFormulario()" value="guardar">
                        </div>
                    </div>

                </form>

            </div>
        <?php } 
    } else {
        echo "No se ha encontrado este producto";
    } ?>
    <script src="JS/comprobacionImg.js"></script>
                
</body>
</html>