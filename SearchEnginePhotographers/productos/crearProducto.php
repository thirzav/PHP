<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/crearProducto.css">
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
    require "../captura/gestion_fotografos.php";
    require "../fotografos/Clases/Fotografo.php";
    require "../captura/gestion_categorias.php";
    require "../categorias/Clases/Categoria.php";

    $categoriasDB = getCategorias();
    $categorias = [];

    foreach($categoriasDB as $i => $categoria){
        $categorias += [$categoria['categoria_id'] => new Categoria($categoria['categoria_id'], $categoria['nombre_cat'], $categoria['fecha_crea_cat'], $categoria['fecha_mod_cat'])];
    }   
    
    $fotografosDB = getFotografos();
    $fotografos = [];

    foreach($fotografosDB as $i => $fotografo){
        $fotografos += [$fotografo['fotografo_id'] => new Fotografo($fotografo['fotografo_id'], $fotografo['nombre_f'], $fotografo['apellido1_f'], $fotografo['apellido2_f'], $fotografo['nombre_empresa'], $fotografo['nif'], $fotografo['direccion_calle_f'], $fotografo['postcode_f'], $fotografo['ciudad_f'], $fotografo['descripcion_f'], $fotografo['foto_perfil'], $fotografo['telefono_f'], $fotografo['email_f'], $fotografo['pass_f'], $fotografo['rol'], $fotografo['fecha_crea_f'], $fotografo['fecha_mod_f'])];
    }
    ?>
    
    <?php if(isset($_SESSION['validacion']['rol']) && $_SESSION['validacion']['rol'] == ("fotografo" || "administrador")) { ?>
        <div id="container">
            <form action="agregarProducto.php" id="formulario_producto" method="post" enctype="multipart/form-data">
                <div id="contenido_container">
                    <div class="div_contenido">
                        <h1 id="titulo_crear">Crear producto nuevo:</h1>
                        <label for="nombre_p" class="labels">Nombre del producto:</label>
                        <input type="text" name="nombre_p" id="nombre_p" required>
                    </div>
                    <div class="div_contenido">
                        <label for="fotos" class="labels">Fotos:</label>
                        <label for="nombre_fotos" class="labels">Nombre carpeta de fotos:</label>
                        <input type="text" name="nombre_fotos" id="nombre_fotos">

                        <div id="div_input_img">
                            <div>
                                <input type="file" name="imagen1" id="imagen1" class="input_img" required>
                                <p class="errorMsg" id="error1">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                                <input type="file" name="imagen2" id="imagen2" class="input_img" required>
                                <p class="errorMsg" id="error2">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                                <input type="file" name="imagen3" id="imagen3" class="input_img" required>
                                <p class="errorMsg" id="error3">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                            </div>
                            <div>
                                <input type="file" name="imagen4" id="imagen4" class="input_img" required>
                                <p class="errorMsg" id="error4">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>
                                <input type="file" name="imagen5" id="imagen5" class="input_img" required>    
                                <p class="errorMsg" id="error5">El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.</p>                    
                            </div>
                        </div>
                    </div>
                    <div class="div_contenido" id="contenido_categoria_duracion">
                        <div>
                            <label for="categoria_id" class="labels">Categoria</label>
                            <select name="categoria_id" id="categoria_id">
                                <option value="">elige una categoria</option>
                                <?php foreach($categorias as $i => $categoria) { ?>
                                    <option value="<?php echo $categoria->getCategoriaId() ?>"><?php echo $categoria->getNombreCat()?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <label for="duracion" class="labels">Duración de la sesión:</label>
                            <input type="text" name="duracion" id="duracion">
                        </div>
                    </div>
                    <div class="div_contenido">
                        <label for="descripcion" class="labels">Descripción del producto:</label>
                        <textarea name="descripcion" id="descripcion"></textarea>
                    </div>
                    <div class="div_contenido">
                        <label for="pve" class="labels">Precio en € (sin IVA)</label>
                        <input type="number" name="pve" id="pve">
                        <?php if(isset($_SESSION['validacion']['rol']) && $_SESSION['validacion']['rol'] == "administrador") { ?>
                            <div>
                                <label for="fotografo" class="labels">Fotógrafo:</label>
                                <select name="fotografo" id="fotografo">
                                    <option value="">elige un fotógrafo</option>
                                    <?php foreach($fotografos as $i => $fotografo) { ?>
                                    <option value="<?php echo $fotografo->getFotografoId() ?>"><?php echo $fotografo->getNombreF() . " " . $fotografo->getApellido1F() . " " . $fotografo->getApellido2F()?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="div_contenido" id="div_contenido_submit">
                        <input type="submit" name="btn_submit" id="btn_submit" onclick="validarFormulario()" value="crear">
                    </div>
                </div>

            </form>

        </div>
    <?php } ?>
    <script src="JS/comprobacionImg.js"></script>
                
</body>
</html>