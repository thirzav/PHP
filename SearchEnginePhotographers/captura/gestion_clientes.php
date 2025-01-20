<?php

require_once "../funciones/conexionDB.php";

// ----------------------------------------- GET -------------------------------------------

// -------------- para el adminisitrador -----------------------

// retorna info de 1 cliente
function getCliente($client_id) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $cliente = $conexion->query("SELECT * FROM clientes WHERE client_id = '$client_id'");
    }

    return $cliente;
    $conexion->close();
}

// retorna toda la info de los clientes para la lista para administrador
function getClientes(){
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $clientes = $conexion->query("SELECT * FROM clientes");
    }

    return $clientes;
    $conexion->close();
}

// retorna client_id pasando el email
function getClientId($email) {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $client_id = $conexion->query("SELECT client_id FROM clientes WHERE email = '$email'");
    }

    return $client_id;
    $conexion->close();
}

// ---------------------------------------------------------- SET -------------------------------------------------------------

function setCliente($cliente) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('INSERT INTO clientes(rol, pass, nombre_c, apellido1_c, apellido2_c, email, telefono, direccion_calle, postcode, ciudad) VALUES ("' . $cliente->getRol() . '","' . $cliente->getPass() . '","' . $cliente->getNombreC() . '","' . $cliente->getApellido1C() .'","' . $cliente->getApellido2C() . '","' . $cliente->getEmail() . '","' . $cliente->getTelefono() . '","' . $cliente->getCalle() . '","' . $cliente->getPostcode() . '","' . $cliente->getCiudad() . '")');
    }

    $conexion->close();
}

// ----------------------------------------------------------- UPDATE -----------------------------------------------------------

function updateCliente($updateCliente, $client_id){
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query('UPDATE clientes SET rol ="' . $updateCliente->getRol() . '", pass ="' . $updateCliente->getPass() . '", nombre_c ="' . $updateCliente->getNombreC() . '", apellido1_c = "' . $updateCliente->getApellido1C() . '", apellido2_c = "' . $updateCliente->getApellido2C() . '", email = "' . $updateCliente->getEmail() . '", telefono = "' . $updateCliente->getTelefono() . '", direccion_calle = "' . $updateCliente->getCalle() . '", postcode = "' . $updateCliente->getPostcode() . '", ciudad = "' . $updateCliente->getCiudad() . '" WHERE client_id = "'. $client_id . '" ');
    }

    $conexion->close();
}

// cambia la contraseña en la BBDD de un cliente
function updatePass($pass, $client_id) {
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("UPDATE clientes SET pass ='$pass' WHERE client_id = '$client_id'");
    }

    $conexion->close();
}

// --------------------------------------------------------------- DELETE -----------------------------------------------------------

function deleteCliente($client_id){
    $conexion = conectar();

    if($conexion->errno){
        echo "<pre>$conexion->error</p>";
    } else {
        $conexion->query("DELETE FROM clientes WHERE client_id = '$client_id'");
    }

    $conexion->close();
}