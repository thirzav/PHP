<?php

require "../funciones/conexionDB.php";

function getLoginUsuarios() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $datosLogin = $conexion->query("SELECT rol, pass, email FROM clientes");
    }

    return $datosLogin;
    $conexion->close();
}

function getLoginFotografos() {
    $conexion = conectar();

    if($conexion->errno) {
        echo "<pre>$conexion->error</pre>";
    } else {
        $datosLogin = $conexion->query("SELECT rol, pass_f, email_f FROM fotografos");
    }

    return $datosLogin;
    $conexion->close();
}