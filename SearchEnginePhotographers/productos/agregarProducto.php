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
require "../funciones/comprobaciones.php";
require "../fotos/Clases/Fotos.php";

if(isset($_SESSION['validacion']) && $_SESSION['validacion']['rol'] == ("administrador" || "fotografo")){

    if($_SESSION['validacion']['rol'] == "fotografo") {
        // para saber nombre empresa para hacer url imagen necesitamos el email para llamar getNombreEmpresaConEmail()
        $emailFotografo = $_SESSION['validacion']['email'];
        $nombreEmpresaDB = getNombreEmpresaConEmail($emailFotografo);
        // $nombreEmpresa = [];
        foreach($nombreEmpresaDB as $i => $valor) {
            $nombreEmpresa = $valor['nombre_empresa'];
            $fotografo_id = $valor['fotografo_id'];
        }
    } else if ($_SESSION['validacion']['rol'] == "administrador") {
        $fotografo_id = $_POST['fotografo'];
        $fotografo = getFotografo($fotografo_id);

        foreach($fotografo as $i => $fotografo){
            $nombreEmpresa = $fotografo['nombre_empresa'];
        }
    }


    // para recoger el formato de la foto

    if(isset($_FILES)){
        $fotos = [];
        foreach($_FILES as $i => $valor){
            array_push($fotos, $valor);
        }


        if(isset($_POST['nombre_fotos']) && $_POST['nombre_fotos'] != "") {
            $_POST['nombre_fotos'] = trim($_POST['nombre_fotos']);
            $nombreFotoComp = true;
        } else {
            $nombreFotoComp = false;
        }
        
        // recorrer todas las fotos para poder crear un url único para cada uno
        if($nombreFotoComp) {
            foreach($fotos as $i => $fvalor){

                $formatoFoto = formatoFoto($fvalor['name']); 

                if($formatoFoto == "png" || $formatoFoto == "jpeg" || $formatoFoto == "jpg") {
                    // para crear una variable dinámica (declaramos una variable y asignamos el nombre):
                    $a = "urlImagen" . $i;
                    $nombreEmpresa = $nombreEmpresa . $i;
                    // asignamos valor a la variabel dinámica
                    $$a = moverFoto2($fvalor, ($nombreEmpresa . $_POST['nombre_fotos']), $formatoFoto);
                }
            }
        } else {
            echo "El nombre de las fotos está vacío o ya lo has usado anteriormente.";
        }
    }

    // antes de enviar las fotos comprobamos los datos del producto
    if(isset($_POST['nombre_p']) && $_POST['nombre_p'] != "") {
        $_POST['nombre_p'] = trim($_POST['nombre_p']);
        $nombrePComp = true;
    } else {
        $nombrePComp = false;
    }

    if(isset($_POST['duracion']) && $_POST['duracion'] != "") {
        $_POST['duracion'] = trim($_POST['duracion']);
        $duracionComp = true;
    } else {
        $duracionComp = false;
    }

    if(isset($_POST['descripcion']) && $_POST['descripcion'] != "") {
        $_POST['descripcion'] = trim($_POST['descripcion']);
        $descripcionComp = true;
    } else {
        $descripcionComp = false;
    }

    if(isset($_POST['pve']) && $_POST['pve'] != "") {
        $pveComp = true;
    } else {
        $pveComp = false;
    }

    if(isset($_POST['categoria_id']) && $_POST['categoria_id'] != ""){
        $categoria_id = intval($_POST['categoria_id']); // hay que convertir a int para poder subirlo a la tabla intermedia
        $categoriaComp = true;
    } else {
        $categoriaComp = false;
    }


    if($nombreFotoComp && $nombrePComp && $duracionComp && $descripcionComp && $pveComp && $categoriaComp) {
        $fotos = new Foto(
            "",
            $_POST['nombre_fotos'],
            $urlImagen0,
            $urlImagen1,
            $urlImagen2,
            $urlImagen3,
            $urlImagen4,
            "",
            "",
        );

        setFotos($fotos);

        $producto = new Producto(
            "",
            $_POST['nombre_p'],
            $_POST['duracion'],
            $_POST['descripcion'],
            $_POST['pve'],
            "",
            ""
        );

        setProducto($producto);

        // bajamos los productos para obtener el último id añadido
        $productosDB = getProductosSimple();

        foreach($productosDB as $i => $pvalor) {
            $product_id = $pvalor['product_id'];
        }

        echo $product_id;
        echo "<br>";

        // bajamos los registros de fotos para obtener el último id añadido
        $fotosDB = getFotos();

        foreach($fotosDB as $i => $fvalor){
            $foto_id = $fvalor['foto_id'];
        }
        echo $foto_id;
        
        echo $fotografo_id;

        setProdFotCat($product_id, $fotografo_id, $categoria_id, $foto_id);

        header("location: listaProductos.php");
        exit();
    } else {
        echo "Los datos introducidos no son correctos.";
    }

    

} else {
    header("location: ../index.php");
    exit();
}
