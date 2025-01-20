<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/listaPersonaje.css">
    <title>Knights and Dragons</title>
</head>
<body>

<?php
session_start();

?>

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
    <main>
  <h2>Lista de Personajes</h2>
        <div id="containerFichas">
            <?php if(isset($_SESSION['personajes']) && !empty($_SESSION['personajes'])): 
                foreach ($_SESSION['personajes'] as $personaje) {
                    echo '<div class="fichaPersonaje">';
                    echo '<div class="fichaDetalles"><h4>Nombre: </h4><p>' . htmlspecialchars($personaje['nombre']) . '</p></div>';
                    echo '<div class=fichaDetalles><h4>Raza: </h4>' . htmlspecialchars($personaje['raza']) . '</p></div>';
                    echo '<div class=fichaDetalles><h4>Clase: </h4>' . htmlspecialchars($personaje['clase']) . '</p></div>';
                    echo '<div class=fichaDetalles id="fichaAtributos"><h4>Atributos: </h4>';
                    echo '<div class="atributos"><h5>Fuerza: </h5>' . htmlspecialchars($personaje['fuerza']) . '</div>';
                    echo '<div class="atributos"><h5>Defensa: </h5>' . htmlspecialchars($personaje['defensa']) . '</div>';
                    echo '<div class="atributos"><h5>Ataque: </h5>' . htmlspecialchars($personaje['ataque']) . '</div>';
                    echo '<div class="atributos"><h5>Inteligencia: </h5>' . htmlspecialchars($personaje['inteligencia']) . '</div>';
                    echo '<div class="atributos"><h5>Velocidad: </h5>' . htmlspecialchars($personaje['velocidad']) . '</div></div>';
                    // echo '<h4>Habilidades: </h4>' . htmlspecialchars($personaje['habilidades']);
                    // echo '<h4>Historia: </h4>' . htmlspecialchars($personaje['historia']);
                    echo '</div>';
                }
                ?>
            <?php else: ?>
                <p>No hay personajes creados.</p>
            <?php endif; ?>
        </div>
    </main>




</body>
</html>



