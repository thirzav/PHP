<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/loginValidacion.css">
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
    require "../captura/gestion_login.php";

    ?>

    <div id="container">

    <?php

    if(isset($_POST)) {

        // comprobar que campos no están vacíos
        if($_POST['email'] != "" && $_POST['password'] != "") {
            $email = $_POST['email'];
            $pass = hash('sha512', $_POST['password']);

            $datosUsuariosDB = getLoginUsuarios(); // recoger datos todos usuarios de BBDD
            $datosFotografosDB = getLoginFotografos(); // recoger datos todos usuarios de BBDD
            $validacion = false; // variable de comprobación

            // comprobar si existe el registro en la BBDD:

            foreach($datosUsuariosDB as $i => $lvalor) {
                if($lvalor['email'] == $email && $lvalor['pass'] == $pass) {
                    $rol = $lvalor['rol'];
                    $validacion = true;
                    echo "validacion correcta";
                } 
            }

            if(!$validacion) {
                foreach($datosFotografosDB as $i => $lvalor) {
                    if($lvalor['email_f'] == $email && $lvalor['pass_f'] == $pass) {
                        $rol = $lvalor['rol'];
                        $validacion = true;
                        echo "validacion correcta";
                    }
                }
            }

            // en caso de que el email y la contraseña no coinciden con ningún dato de la BBDD:
            if(!$validacion) {
                echo "<p id=''txt_error>El email y la contraseña no coinciden. Por favor, vuelve atrás e inténtalo de nuevo.</p>";
                echo "<a href='login.php' id='enlace_volver'>Login</a>";
            } else if ($validacion) {

                // en caso de que haya match:
                if(isset($_SESSION['validacion'])) {
                    unset($_SESSION['validacion']);
                    $_SESSION['validacion'] = ['email' => $email, 'pass' => $pass, 'rol' => $rol];
                    var_dump($_SESSION['validacion']);
                } else {
                    $_SESSION['validacion'] = ['email' => $email, 'pass' => $pass, 'rol' => $rol];
                    var_dump($_SESSION['validacion']);
                }

                // configurar $_COOKIE si hace falta
                if($_POST['recordar']){

                    // primero hay que destruir el cookie si existe
                    if(isset($_COOKIE['validacion'])) {
                        setCookie("validacion", "", time() - 3600, '/');
                    }

                    // después setear el cookie en forma de array:
                    setcookie("validacion[email]", $email, time() + 3600, '/');
                    setcookie("validacion[pass]", $pass, time() + 3600, '/');
                    setcookie("validacion[rol]", $rol, time() + 3600, '/');
                    
                }

                header("location: ../index.php");
                exit();
                
            }


        }

    } 

    ?>
    </div>
</body>
</html>