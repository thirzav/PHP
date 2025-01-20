<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/contacto.css">
    <title>Knights and Dragons</title>
</head>
<body>
    <header id="encabezado">
        <h1 id="titulo">Knights of Dragons</h1>
        <nav id="navbar">
            <ul id="listaNavbar">
                <li class="cajaEnlace"><a href="../index.php" class="enlace">Inicio</a></li>
                <li class="cajaEnlace"><a href="crearPersonaje.php" class="enlace">Crear Personaje</a></li>
                <li class="cajaEnlace"><a href="listaPersonajes.php" class="enlace">Lista de Personajes</a></li>
                <li class="cajaEnlace"><a href="contacto.php" class="enlace">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main id="contacto">
            <div id="div_form_header">
                <h1 id="titulo_contacto">Contáctanos</h1>
                <h3 id="titulo_explicacion">Por favor, rellena el formulario debajo</h3>
            </div>
            <div id="div_form_contenido">
                <form action="" method="post">
                    <h3 class="titulo_txtbox">Nombre completo</h3>
                    <div id="div_txtbox_nombre">
                        <div class="div_input">
                            <input type="text" name="nombre" />
                            <p>Nombre</p>     
                        </div>

                        <div class="div_input">
                            <input type="text" name="apellido" />
                            <p>Apellidos</p>
                        </div>                        
                    </div>

                    <div id="div_txtbox_email">
                        <h3 class="titulo_txtbox">Email</h3>
                        <input type="email" name="email" id="email"/>
                        <p>ejemplo@ejemplo.com</p>
                    </div>

                    <div id="div_txtbox_mensaje">
                        <h3 class="titulo_txtbox">Mensaje</h3>
                        <textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje aquí..."></textarea>
                    </div>


                    <div id="div_submit">
                        <input type="submit" id="btn_submit"/>
                    </div>
                </form>
            </div>
    </main>

<?php



?>

</body>
</html>