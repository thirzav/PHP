<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="../header/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/registro.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg"> 
    <title>Captura!</title>
</head>
<body>
    <?php include "../header/header.php";
    
    session_start();
        
    require_once "../funciones/functionCookie.php";
    if(isset($_COOKIE['validacion'])) {
        setSessionCookie();
    }

    if(isset($_SESSION['validacion'])) {
        header("location: ../index.php");
        exit();
    } else { ?>

    <div id="containerRegistro">
        <div id="ficha_login">
            <div id="login">
                    <h1 class="header_login">REGISTRO</h1>
                    <div id="div_btn_redirigir">
                        <a href="../clientes/crearCliente.php" class="btn_redirigir">Usuario</a>
                        <a href="../fotografos/crearFotografo.php" class="btn_redirigir">Fotógrafo</a>
                    </div>
                </div>
            <div>
                <h1 class="header_login" id="header_bienvenida">Bienvenido!</h1>
                <div id="div_enlace_registrar">
                    <a href="registrar.php" class="enlace">Ya tienes una cuenta? Haz clic aquí para ir al login!</a>
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