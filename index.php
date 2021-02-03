<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>TBD</title>
        <link rel="stylesheet" href="./css/estilo.css">

    </head>
    <body>
        <div class="contenedor" id="encabezado">
            <header>
                <h1>Belugabi Gamez</h1>
                <img src="./img/logito.png" alt="logo">
                <h3>El mejor sitio de juegos pero es solo overwatch</h3>
            </header>
        </div>
        <div id="menu">
            <a href="#">Página principal</a>
            <a target="_blank" href="./login.html">Inicio de sesión</a>
            <a target="_blank" href="./login.html">Registro</a>
            <a href="#">Contacto</a>
        </div>
        <div id="categorias">
            <h2>Categorías</h2>
            <ul class="lista_lateral">
                <li><a href="#">FPS</a></li>
                <li><a href="#">RPG</a></li>
                <li><a href="#">RTS</a></li>
                <li><a href="#">Casual</a></li>
                <li><a href="#">Racing</a></li>
                <li><a href="#">Sports</a></li>
            </ul>
        </div>
        <div id="buscador">
            <label for="buscar">Ingresa tu busqueda</label>
            <input type="text">
            <input type="button" id="boton_buscar" value="Buscar">
        </div>
        <div id="juegos">
            <h3>Juegos Registrados</h3>
            <div class="juego">
                <img src="./img/OW_cover.jpg" alt="cover" width="100px"> <!--sacar para el css-->
                <span class="nombre-producto">Overwatch</span>
                <p>"Best game ever" -elrubius</p>
                <span class="precio-producto">U$S 10</span>
            </div>
            <div class="juego">
                <img src="./img/OW_cover.jpg" alt="cover" width="100px"> <!--sacar para el css-->
                <span class="nombre-producto">Overwatch</span>
                <p>"Best game ever" -elrubius</p>
                <span class="precio-producto">U$S 15</span>
            </div>
            <div class="juego">
                <img src="./img/OW_cover.jpg" alt="cover" width="100px"> <!--sacar para el css-->
                <span class="nombre-producto">Overwatch</span>
                <p>"Best game ever" -elrubius</p>
                <span class="precio-producto">U$S 20</span>
            </div>
            <div class="juego">
                <img src="./img/OW_cover.jpg" alt="cover" width="100px"> <!--sacar para el css-->
                <span class="nombre-producto">Overwatch</span>
                <p>"Best game ever" -elrubius</p>
                <span class="precio-producto">U$S 25</span>
            </div>
        </div>
    </body>

</html>