<?php

function setSessionCookie() {
    
    if(isset($_COOKIE['validacion'])) {
        $email = $_COOKIE['validacion']['email'];
        $pass = $_COOKIE['validacion']['pass'];
        $rol = $_COOKIE['validacion']['rol'];

        $_SESSION['validacion'] = ['email' => $email, 'pass' => $pass, 'rol' => $rol];

    }
}