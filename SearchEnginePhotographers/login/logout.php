<?php
   
   session_start();

        // destruir cookie si existe
        if(isset($_COOKIE['validacion'])) {
            setcookie("validacion[email]", "", time() - 3600, '/');
            setcookie("validacion[pass]", "", time() - 3600, '/');
            setcookie("validacion[rol]", "", time() - 3600, '/');
        }

        // borrar session si existe
        if(isset($_SESSION['validacion'])) {
            session_unset();
            session_destroy();
            echo "session destroy done";
        }

include "../header/header.php";

header("location: ../index.php");
?>
