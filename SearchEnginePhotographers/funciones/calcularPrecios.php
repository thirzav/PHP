<?php

function calcularIva($subtotal) {
    $iva = $subtotal * 0.21;
    $iva = number_format($iva, 2);

    return $iva;
}

function precioConIva($pve) {
    $precioTotal = $pve * 1.21;
    $precioTotal = number_format($precioTotal, 2);

    return $precioTotal;
}