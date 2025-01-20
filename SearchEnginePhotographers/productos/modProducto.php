<?php

session_start();
    
require "../funciones/functionCookie.php";
if(isset($_COOKIE['validacion'])) {
    setSessionCookie();
}

require "../captura/gestion_productos.php";
require "Clases/Producto.php";
require "../captura/gestion_fotografos.php";
require "../captura/gestion_prod_fot_cat.php";
require "../captura/gestion_fotos.php";
require "../fotos/Clases/Fotos.php";
require "../funciones/comprobaciones.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == ("administrador" || "fotografo")){
    if(isset($_GET['product_id']) && $_GET['product_id'] != "" && isset($_POST)) {

        // ------------------------------------------------------- parte del producto ----------------------------------------------------
        $product_id = $_GET['product_id'];

        $productoOld = getProducto($product_id);

        foreach($productoOld as $i => $pvalor) {
            $productoOld = $pvalor;
        }

        if(isset($_POST['nombre_p']) && $_POST['nombre_p'] != "" && $_POST['nombre_p'] != $productoOld['nombre_p']) {
            $_POST['nombre_p'] = trim($_POST['nombre_p']);
            $productoOld['nombre_p'] == $_POST['nombre_p'];
        }
        
        if(isset($_POST['duracion']) && $_POST['duracion'] != "" && $_POST['duracion'] != $productoOld['duracion']) {
            $_POST['duracion'] = trim($_POST['duracion']);
            $productoOld['duracion'] == $_POST['duracion'];
        } 

        if(isset($_POST['descripcion']) && $_POST['descripcion'] != "" && $_POST['descripcion'] != $productoOld['descripcion']) {
            $_POST['descripcion'] = trim($_POST['descripcion']);
            $productoOld['descripcion'] == $_POST['descripcion'];
        } 
        
        if(isset($_POST['pve']) && $_POST['pve'] != "" && $_POST['pve'] != $productoOld['pve']) {
            $productoOld['pve'] == $_POST['pve'];
        } 

        $updateProducto = new Producto (
            "",
            $_POST['nombre_p'],
            $_POST['duracion'],
            $_POST['descripcion'],
            $_POST['pve'],
            "",
            ""
        );

        updateProducto($updateProducto, $product_id);

        // ---------------------------------------------- parte de las fotos -------------------------------------------------
        
        if(isset($_POST['foto_id']) && $_POST['foto_id'] != ""){
            $foto_id = $_POST['foto_id'];

            $fotosOld = getFotos($foto_id);

            foreach($fotosOld as $i => $fvalor) {
                $fotosOld = $fvalor;
            }

        }

        
        if(isset($_FILES)){
            $fotos = [];
            foreach($_FILES as $i => $valor){
                array_push($fotos, $valor);
            }

            if(isset($_POST['nombre_foto']) && $_POST['nombre_foto'] != "" && $_POST['nombre_foto'] != $productoOld['nombre_foto']) {
                $_POST['nombre_foto'] = trim($_POST['nombre_foto']);
                $productoOld['nombre_foto'] == $_POST['nombre_foto'];
            } 
            
            // recorrer todas las fotos para poder crear un url único para cada uno

            foreach($fotos as $i => $fvalor){
                if($fvalor['name'] != ""){
                    $formatoFoto = formatoFoto($fvalor['name']); 
                    $nombreEmpresa = "";
                    
                    if($formatoFoto == "png" || $formatoFoto == "jpeg" || $formatoFoto == "jpg") {
                        // para crear una variable dinámica (declaramos una variable y asignamos el nombre):
                        $a = "urlImagen" . $i;
                        $nombreEmpresa = $nombreEmpresa . $i;
                        // asignamos valor a la variabel dinámica
                        $$a = moverFoto2($fvalor, ($nombreEmpresa . $_POST['nombre_foto']), $formatoFoto);
                    }
                }
            } 

            if(isset($urlImagen0) && $urlImagen0 != $_POST['oldImagen1']) {
                $_POST['oldImagen1'] = $urlImagen0;
            }

            if(isset($urlImagen1) && $urlImagen1 != $_POST['oldImagen2']) {
                $_POST['oldImagen2'] = $urlImagen1;
            }

            if(isset($urlImagen2) && $urlImagen2 != $_POST['oldImagen3']) {
                $_POST['oldImagen3'] = $urlImagen2;
            }

            if(isset($urlImagen3) && $urlImagen3 != $_POST['oldImagen4']) {
                $_POST['oldImagen4'] = $urlImagen3;
            }

            if(isset($urlImagen4) && $urlImagen4 != $_POST['oldImagen5']) {
                $_POST['oldImagen5'] = $urlImagen4;
            }

            $updateFoto = new Foto (
                "",
                $productoOld['nombre_foto'],
                $_POST['oldImagen1'],
                $_POST['oldImagen2'],
                $_POST['oldImagen3'],
                $_POST['oldImagen4'],
                $_POST['oldImagen5'],
                "",
                ""
            );

            updateFotos($updateFoto, $foto_id);
        }

        // --------------------------------------------------------------------- parte categoria -----------------------------------------------------

        if(isset($_POST['nombre_cat']) && $_POST['nombre_cat'] != "" && $_POST['nombre_cat'] != $productoOld['categoria_id']) {
            $productoOld['categoria_id'] = $_POST['nombre_cat'];
        }

        // ------------------------------------------------------------------------ parte fotógrafo -------------------------------------------------------

        if(isset($_POST['fotografo']) && $_POST['fotografo'] != "" && $_POST['fotografo'] != $productoOld['fotografo_id']) {
            $productoOld['fotografo_id'] = $_POST['fotografo'];
        }

        updateProdFotCat($product_id, $productoOld['fotografo_id'], $productoOld['categoria_id'], $foto_id, $productoOld['prodfotcat_id']);

        header("location: listaProductos.php");
        exit();


    } else {
        echo "Producto no encontrado.";
    }
    
} else {
    header("location: ../index.php");
    exit();
}