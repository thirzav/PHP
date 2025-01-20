<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Comprobamos si existe la lista, sino lo inicializamos
    if (!isset($_SESSION['personajes'])) {
        $_SESSION['personajes'] = [];
    }

    // Crear el personaje
    $personaje = [
        'nombre' => $_POST['nombre'], 
        'raza' => $_POST['raza'], 
        'clase' => $_POST['clase'], 
        'equipamiento' => $_POST['equipamiento'], 
        'fuerza' => $_POST['fuerza'], 
        'defensa' => $_POST['defensa'], 
        'ataque' => $_POST['ataque'],
        'inteligencia' => $_POST['inteligencia'], 
        'velocidad' => $_POST['velocidad'], 
        'habilidades' => $_POST['habilidades'], 
        'historia' => $_POST['historia']
    ];

    // Añadir personaje a array $_SESSION
    $_SESSION['personajes'][] = $personaje;

    //Para redirigir después de crear un personaje nuevo
    header("Location: listaPersonajes.php");
    exit();

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/crearPersonaje.css">
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
    <main>
    <h2>Crear Personaje</h2>
        <form method="POST" action="crearpersonaje.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="raza">Raza:</label>
            <select id="raza" name="raza">
                <option value="humano">Humano</option>
                <option value="elfo">Elfo</option>
                <option value="elfo oscuro">Elfo Oscuro</option>
                <option value="enano">Enano</option>
                <option value="demonio">Demonio</option>
                <option value="orco">Orco</option>
            </select>

            <label for="clase">Clase:</label>
            <select id="clase" name="clase">
                <option value="basico">Básico</option>
                <option value="caballero">Caballero</option>
                <option value="espadachin">Espadachín</option>
                <option value="barbaro">Bárbaro</option>
                <option value="guerrero">Guerrero</option>
                <option value="sacerdote">Sacerdote</option>
                <option value="asesino">Asesino</option>
                <option value="curandero">Curandero</option>
            </select>

        
            <h3>Atributos</h3>
            <label for="fuerza">Fuerza (1-50):</label>
            <input type="number" id="fuerza" name="fuerza" min="1" max="50" required>

            <label for="defensa">Defensa (1-50):</label>
            <input type="number" id="defensa" name="defensa" min="1" max="50" required>

            <label for="ataque">Ataque (1-50):</label>
            <input type="number" id="ataque" name="ataque" min="1" max="50" required>

            <label for="inteligencia">Inteligencia (1-50):</label>
            <input type="number" id="inteligencia" name="inteligencia" min="1" max="50" required>

            <label for="velocidad">Velocidad (1-50):</label>
            <input type="number" id="velocidad" name="velocidad" min="1" max="50" required>

            <h3>Habilidades</h3>
            <div class="habilidades-container">
                <div class="habilidades-title">Selecciona habilidades:</div>
                <label><input type="checkbox" name="habilidades[]" value="resistencia_fuego"> Resistencia al Fuego</label>
                <label><input type="checkbox" name="habilidades[]" value="resistencia_electricidad"> Resistencia a la Electricidad</label>
                <label><input type="checkbox" name="habilidades[]" value="resistencia_agua"> Resistencia al Agua</label>
                <label><input type="checkbox" name="habilidades[]" value="resistencia_envenenamiento"> Resistencia al Envenenamiento</label>
                <label><input type="checkbox" name="habilidades[]" value="gran_sabio"> Gran Sabio</label>
                <label><input type="checkbox" name="habilidades[]" value="glotoneria"> Glotonería</label>
                <label><input type="checkbox" name="habilidades[]" value="manipulacion_de_luz"> Manipulación de Luz</label>
                <label><input type="checkbox" name="habilidades[]" value="regeneracion"> Regeneración</label>
            </div>

            <label for="historia">Historia del Jugador:</label>
            <textarea id="historia" name="historia"></textarea>
            
            <label for="equipamiento">Equipamiento:</label>
            <textarea id="equipamiento" name="equipamiento"></textarea>
         


            <button type="submit">Crear Personaje</button>
        </form>
    </main>


</body>
</html>