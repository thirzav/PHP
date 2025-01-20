<?php

function conectar() {
    $conexion = new mysqli("localhost", "root", "", "captura");

    return $conexion;
}