<!DOCTYPE html>

<html>
    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
    
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>TBD</title>
        <link rel="stylesheet" href="./css/estilo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="./js/main.js"></script>
    </head>
 
    <body>
        <div id ="page-container">
            <div class="contenedor">
                {include file = "encabezado.tpl" cat=$categoria}

                <div id="buscador">
                    <label for="buscar">Ingresa tu búsqueda</label>
                    <input type="text" id="texto">
                    <input type="button" id="buscar" value="Buscar" class="boton-chico">

                    <div class="dropdown">
                    <button id="ordenar-btn" class="dropbtn">Ordenar por ▼</button>
                    <div class="dropdown-content-ordenar">
                        <li><a class="por" por="fecha_lanzamiento" orden="ASC" href="#">Fecha de lanzamiento: menos reciente a más reciente</a></li>
                        <li><a class="por" por="fecha_lanzamiento" orden="DESC" href="#">Fecha de lanzamiento: más reciente a menos reciente</a></li>
                        <li><a class="por" por="puntuacion" orden="ASC" href="#">Puntaje: menor a mayor</a></li>
                        <li><a class="por" por="puntuacion" orden="DESC" href="#">Puntaje: mayor a menor</a></li>
                        <li><a class="por" por="visualizaciones" orden="ASC" href="#">Visualizaciones: menor a mayor</a></li>
                        <li><a class="por" por="visualizaciones" orden="DESC" href="#">Visualizaciones: mayor a menor</a></li>
                    </div>
                </div>
                    <span>
                    <div class="dropdown">
                    <button id="consola-btn" class="dropbtn">Ordenar por consola ▼</button>
                    <div class="dropdown-content-ordenar">
                        <li><a class="consola" consola=0 consola-nombre="todas las consolas" href="#">Todas</a></li>
                        {foreach from=$consolas item=con}
                            <li><a class="consola" consola-nombre={$con.nombre} consola={$con.id} href="#">{$con.nombre}</a></li>
                        {/foreach}
                    </div>
                </div>
                    </span>
                        <span id="mensaje-orden">
                        Mostrando juegos ordenados por: fecha de lanzamiento ascendente
                    </span>
                    <span id="mensaje-consola">
                        ; para todas las consolas
                    </span>
                </div>
                    <div id="juego-destacado">
                        {include file="juego_destacado.tpl" jueg=$juegoDestacado}
                    </div>
                <div id="juegos">
                    <h3>{$categoria.nombre}</h3>
                    {foreach from=$juegos item=prod}
                        {include file="tarjeta_juego.tpl" jueg=$jueg}
                    {/foreach}
                </div>
            </div>
            {include file = "footer.tpl"}
        </div>
    </body>

</html>
