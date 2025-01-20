<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>
    <?php include "../header/header.php";
        
    require "../funciones/functionCookie.php";
    if(isset($_COOKIE['validacion'])) {
        setSessionCookie();
    }
    
    if(isset($_SESSION['validacion'])) {
        header("location: ../index.php");
        exit();
    } else { ?>

    <div id="container">
        <div id="ficha_login">
            <div id="login">
                <form action="loginValidacion.php" method="post">
                    <h1 class="header_login">LOGIN</h1>
                    <h3 class="title_login">Usuario</h3>
                    <input type="email" name="email" id="email" class="input_login">
                    <h3 class="title_login">Contraseña</h3>
                    <input type="password" name="password" id="password" class="input_login">
                    <input type="checkbox" name="recordar" id="recordar">
                    <label for="recordar">Recuérdame</label>
                    <div id="div_btn_login">
                        <input type="submit" id="btn_login" value="LOGIN">
                    </div>
                </form>
            </div>

            <div>
                <h1 class="header_login" id="header_bienvenida">Bienvenido!</h1>
                <div id="div_enlace_registrar">
                    <a href="registrar.php" class="enlace">No tienes cuenta? Regístrate!</a>
                </div>
                <p id="text_cuenta">Haz una cuenta para guardar tus fotógrafos favoritos, escribir opiniones o contratar a alguien.</p>
                <div id="div_enlace_volver">
                    <a href="../index.php" class="enlace">< volver</a>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
</body>
</html>