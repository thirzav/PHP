<?php

// vista administrador 

if(isset($_SESSION['validacion']['rol']) && $_SESSION['validacion']['rol'] == "administrador") { ?>

    <header id="encabezado">
        <div id="header_arriba">
            <div>
                <h1 id="titulo">¡Captura!</h1>
                <h2 id="subtitulo">Vive los momentos mágicos para siempre...</h2>
            </div>

            <div id="header_login">
                <div><a href="../login/logout.php" class="btn_login">logout</a></div>
            </div>
        </div>


            <nav id="navbar">
                <ul id="navbarLista">
                    <li><a href="../index.php" class="navEnlace">Inicio</a></li>
                    <li><a href="../fotografos/listaFotografos.php" class="navEnlace">Fotógrafos</a></li>
                    <li><a href="../clientes/listaClientes.php" class="navEnlace">Clientes</a></li>
                    <li><a href="../productos/listaProductos.php" class="navEnlace">Productos</a></li>
                    <li><a href="../categorias/listaCategorias.php" class="navEnlace">Categorias</a></li>
                    <li><a href="../pedidos/listaPedidos.php" class="navEnlace">Facturas</a></li>
                </ul>
            </nav>
    </header>

<!-- vista fotógrafo -->

<?php } else if (isset($_SESSION['validacion']['rol']) && $_SESSION['validacion']['rol'] == "fotografo") { ?>
    <header id="encabezado">
        <div id="header_arriba">
            <div>
                <h1 id="titulo">¡Captura!</h1>
                <h2 id="subtitulo">Vive los momentos mágicos para siempre...</h2>
            </div>

            <div id="header_login">
                <button class="btn" id="btnDropdown" onclick="toggleMostrar()">
                    <img src="../img/menu_icon.png" alt="">
                </button>
                <div class="dropdown" id="dropdownMenu">
                    <a href="../fotografos/perfilFotografo.php" class="dropdownEnlace">Mi perfil</a>
                    <a href="../productos/listaProductos.php" class="dropdownEnlace">Mis productos</a>
                    <a href="../pedidos/listaPedidos.php" class="dropdownEnlace">Mis facturas</a>
                    <a href="../login/logout.php" class="dropdownEnlace">logout</a>
                </div>
            </div>
        </div>


            <nav id="navbar">
                <ul id="navbarLista">
                    <li><a href="../index.php" class="navEnlace">Inicio</a></li>
                    <li><a href="../productos/listaProductos.php" class="navEnlace">Mis productos</a></li>
                    <li><a href="../pedidos/listaPedidos.php" class="navEnlace">Mis facturas</a></li>
                </ul>
            </nav>
    </header>

<!-- vista cliente -->

<?php } else if(isset($_SESSION['validacion']['rol']) && $_SESSION['validacion']['rol'] == "usuario")  { ?>
        <header id="encabezado">
        <div id="header_arriba">
            <div>
                <h1 id="titulo">¡Captura!</h1>
                <h2 id="subtitulo">Vive los momentos mágicos para siempre...</h2>
            </div>
            <div id="header_login">
                <button class="btn" id="btnDropdown" onclick="toggleMostrar()">
                    <img src="../img/menu_icon.png" alt="">
                </button>
                <div class="dropdown" id="dropdownMenu">
                    <a href="../clientes/verCliente.php" class="dropdownEnlace">Mi perfil</a>
                    <a href="../pedidos/listaPedidos.php" class="dropdownEnlace">Mis pedidos</a>
                    <a href="../login/logout.php" class="dropdownEnlace">logout</a>
                </div>
            </div>
        </div>

        <nav id="navbar">
            <ul id="navbarLista">
                <li><a href="../index.php" class="navEnlace">Fotógrafos</a></li>
                <li><a href="../clientes/verCliente.php" class="navEnlace">Mi perfil</a></li>
            </ul>
        </nav>
    </header>

<!-- vista visitante sin cuenta -->

<?php } else { ?>

    <header id="encabezado">
    <div id="header_arriba">
        <div>
            <h1 id="titulo">¡Captura!</h1>
            <h2 id="subtitulo">Vive los momentos mágicos para siempre...</h2>
        </div>

        <div id="header_login">
            <div><a href="../login/registro.php" class="btn_login">registrar</a></div>
            <div><a href="../login/login.php" class="btn_login" id="btn_login_login">login</a></div>
        </div>
    </div>


        <nav id="navbar">
            <ul id="navbarLista">
                <li><a href="../index.php" class="navEnlace">Fotógrafos</a></li>
                <li><a href="../login/registro.php" class="navEnlace">Regístrate</a></li>
            </ul>
        </nav>
    </header>

<?php } ?>
<script src="../header/header.js"></script>
