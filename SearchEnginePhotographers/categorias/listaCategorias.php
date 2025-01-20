<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/listaCategoria.css">
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
    require "../captura/gestion_categorias.php";
    require "Clases/Categoria.php";

    
        $categoriasDB = getCategorias();
        $categorias = [];

        foreach($categoriasDB as $i => $categoria){
            $categorias += [$categoria['categoria_id'] => new Categoria($categoria['categoria_id'], $categoria['nombre_cat'], $categoria['fecha_crea_cat'], $categoria['fecha_mod_cat'])];
        } ?>
        
        <?php if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador"){ ?>

        <div id="div_crear">
            <h2><button onclick="crearCategoria()">Haz clic aquí</button> para crear una ficha de categoria nuevo</h2>
        </div>

        <div id="div_crear_form">
            <form action="agregarCategoria.php" method="POST">
                <div id="div_contenido_crear">
                    <label>Nombre de la categoria:</label>
                    <input type="text" name="nombre_cat" id="nombre_cat">
                    <input type="submit" id="btn_crear" class="btn_submit">
                </div>
            </form>
        </div>

        <script>
            function crearCategoria() {
                var divCrear = document.getElementById('div_crear');
                var divCrearForm = document.getElementById('div_crear_form');

                divCrear.style.display = 'none';
                divCrearForm.style.display = 'block';
            }
        </script>

        <?php } ?>

        <div id="container">
            <?php
            foreach($categorias as $i => $categoria){?>
            
            <?php if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario") || !isset($_SESSION['validacion'])){ ?>
            <a href="categoria.php?categoria_id=<?php echo $categoria->getCategoriaId()?>" id="enlace_categoria">
            <?php } ?>

            <div class="div_ficha">
                <div id="fichaArriba">
                    <div class="div_ficha_arriba">
                        <h1><?php echo $categoria->getNombreCat() ?></h1>
                    </div>

                </div>

                <?php if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "administrador"){ ?>

                <div id="fichaAbajo">
                    <button onclick="mostrarDiv(<?php echo $categoria->getCategoriaId() ?>)" class="enlaceVista">
                        <img src="../../img/edit_icon.png" class="imgIcono">
                    </button>

                    <button onclick="eliminarDiv(<?php echo $categoria->getCategoriaId() ?>)" class="enlaceVista">
                        <img src="../../img/delete_icon.png" class="imgIcono">
                    </button>
                </div>

                <!-- div para editar la categoria -->
                <div id="ficha_editar<?php echo $categoria->getCategoriaId() ?>" class="ficha_editar">
                    <form action="modCategoria.php" method="POST" class="ficha_editar_contenido">
                        <div class="div_label_nombreCat">
                            <label for="nombreCat" class="label_nombreCat"><strong>Nombre de la categoria:</strong></label>
                        </div>
                        <div class="div_centrar">
                            <input type="text" name="nombreCat" id="nombreCat" value="<?php echo $categoria->getNombreCat() ?>" class="input_nombreCat">
                            <input type="hidden" name="categoria_id" id="categoria_id" value="<?php echo $categoria->getCategoriaId() ?>">
                        </div>
                        <div class="div_centrar">
                            <input type="submit" name="btn_editar" id="btn_editar" class="btn_submit" value="guardar">
                        </div>
                    </form>
                    <div class="div_centrar2">
                        <button onclick="aparecerDivEditar(<?php echo $categoria->getCategoriaId() ?>)" class="enlaceVista">
                            <div id="btnVolver">volver</div>
                        </button>
                    </div>
                </div>

                <!-- script para que aparezca el div que deja modificar la categoria -->
                <script>
                    function mostrarDiv(divId) {
                        // Obtener el div por su id usando el parámetro ya que es dinámico
                        var div = document.getElementById('ficha_editar' + divId);
                        
                        // Cambiar su estilo para que sea visible
                        div.style.display = "block";

                    }

                    // function para hacer que desaparezca el div otra vez
                    function aparecerDivEditar(divId) {

                        var div = document.getElementById('ficha_editar' + divId);

                        div.style.display = "none";

                    }

                </script>

            <!-- div para eliminar la categoria -->
                <div id="ficha_eliminar<?php echo $categoria->getCategoriaId() ?>" class="ficha_eliminar">
                    <form action="eliminarCategoria.php?categoria_id=<?php echo $categoria->getCategoriaId() ?>" method="POST" class="ficha_eliminar_contenido">
                        <div class="div_label">
                            <h2 class="txt_label">Estás seguro que quieres eliminar esta categoria?</h2>
                        </div>
                        <div class="div_centrar">
                            <input type="hidden" name="categoria_id" id="categoria_id" value="<?php echo $categoria->getCategoriaId() ?>">
                        </div>
                        <div class="div_centrar_btns">
                            <div>
                                <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btnEliminar" value="eliminar">
                            </div>

                        </div>
                    </form>
                    <div class="div_centrar2">
                        <button onclick="aparecerDivEliminar(<?php echo $categoria->getCategoriaId() ?>)" class="enlaceVista">
                            <div id="btnVolver">volver</div>
                        </button>
                    </div>
                </div>


                <!-- script para que aparezca el div que deja eliminar la categoria -->
                <script>
                    function eliminarDiv(divId) {
                        // Obtener el div por su id usando el parámetro ya que es dinámico
                        var div = document.getElementById('ficha_eliminar' + divId);
                        
                        // Cambiar su estilo para que sea visible
                        div.style.display = "block";

                    }

                    function aparecerDivEliminar(divId) {

                        var div = document.getElementById('ficha_eliminar' + divId);

                        div.style.display = "none";
                    }


                </script>
                <?php } ?>

            </div>
            <?php if((isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == "usuario") || !isset($_SESSION['validacion'])){ ?>
            </a>
            <?php } ?>
            <?php } ?>
        </div>
</body>
</html>