<?php 

require_once "../funciones/conexionDB.php";

// ---------------------------------------------------------------------- VER ------------------------------------------------------------------

// retorna todos los productos, con fotógrafo, fotos y categoria
function getProductos() {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</pre>";
    } else {
        $productos = $conexion->query("SELECT p.*, f.*, fotos.*, cat.nombre_cat FROM productos p INNER JOIN prod_fot_cat pfc ON pfc.product_id = p.product_id INNER JOIN fotografos f ON f.fotografo_id = pfc.fotografo_id INNER JOIN fotos ON fotos.foto_id = pfc.foto_id INNER JOIN categorias cat ON cat.categoria_id = pfc.categoria_id");
    }

    return $productos;
    $conexion->close();
}

// retorna los productos con el mismo product_id
function getProducto($product_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</pre>";
    } else {
        $producto = $conexion->query("SELECT p.*, f.*, fotos.*, cat.*, pfc.prodfotcat_id FROM productos p INNER JOIN prod_fot_cat pfc ON pfc.product_id = p.product_id INNER JOIN fotografos f ON f.fotografo_id = pfc.fotografo_id INNER JOIN fotos ON fotos.foto_id = pfc.foto_id INNER JOIN categorias cat ON cat.categoria_id = pfc.categoria_id WHERE p.product_id='$product_id'");
    }

    return $producto;
    $conexion->close();
}

// retorna la clase de productos (solamente los campos de la tabla productos)
function getProductosSimple() {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</pre>";
    } else {
        $productos = $conexion->query("SELECT * FROM productos");
    }

    return $productos;
    $conexion->close();
}

// retorna todos los productos de un fotógrafo, con sus datos, las fotos y la categoria
function getProductosAll($fotografo_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</pre>";
    } else {
        $productosFotografo = $conexion->query("SELECT pfc.*, f.*, p.*, fotos.*, cat.* FROM prod_fot_cat pfc INNER JOIN fotografos f ON f.fotografo_id = pfc.fotografo_id INNER JOIN productos p ON p.product_id = pfc.product_id INNER JOIN fotos ON fotos.foto_id = pfc.foto_id INNER JOIN categorias cat ON cat.categoria_id = pfc.categoria_id WHERE pfc.fotografo_id = '$fotografo_id'");
    }

    return $productosFotografo;
    $conexion->close();
}

// ---------------------------------------------------------------------- INSERTAR ------------------------------------------------------------------

// crea un registro nuevo en la tabla producto
function setProducto($producto) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('INSERT INTO productos(nombre_p, duracion, descripcion, pve) VALUES ("' . $producto->getNombreP() . '", "' . $producto->getDuracion() . '", "' . $producto->getDescripcion() . '", "' . $producto->getPve() . '")');
    }

    $conexion->close();
}

// ---------------------------------------------------------------------- EDITAR ------------------------------------------------------------------

// cambia los datos de un registro de la tabla productos
function updateProducto($updateProducto, $product_id){
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('UPDATE productos SET nombre_p ="' . $updateProducto->getNombreP() . '", duracion ="' . $updateProducto->getDuracion() . '", descripcion ="' . $updateProducto->getDescripcion() . '", pve ="' . $updateProducto->getPve() . '" WHERE product_id = "'. $product_id . '"');
    }

    $conexion->close();
}
