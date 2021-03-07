<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
        <meta charset="UTF-8" lang="es">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <meta name="description" content="esto es una pagina web re loca">
        <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="./js/main.js"></script>
        {if (isset($producto))}
            <title>{$producto.nombre}</title>
        {else}
                <h1>Producto inexistente</h1>
        {/if}
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        {include file = "encabezado.tpl" juego=$producto noMostrarCat=true}
        <div class="contenedor" id>
            <span hidden="true" usuario={$usuarioLogueado}></span>
            <div id="pagina-juego" idJuego={$producto.id}>
                {if (isset($producto))}
                    <h1>{$producto.nombre}</h1>
                    <div class="media">
                        <img src={$producto.poster} alt="Imagen"/>
                        <iframe width="600" height="390" src={$producto.url_video}></iframe>
                    </div>
                    <div id="resumen-juego" class="info-juego">
                        <h3>Resumen:</h3>
                        <p>{$producto.resumen}</p>
                    </div>
                    <div id="desarrollador-juego" class="info-juego">
                        <h3>Desarrollador:</h3>
                        <p>{$producto.empresa}</p>
                    </div>
                    <div id="fecha-juego" class="info-juego">
                        <h3>Fecha de lanzamiento:</h3>
                        <p>{$producto.fecha_lanzamiento}</p>
                    </div>
                     <div id="visualizaciones-juego" class="info-juego">
                        <h3>Número de visitas:</h3>
                        <p>{$producto.visualizaciones}</p>
                    </div>
                     <div id="consolas-juego" class="info-juego">
                        <h3>Disponible en las plataformas:</h3>
                        <ul>
                            {foreach from=$consolas item=consola}
                                <li>{$consola.nombre}</li>
                            {/foreach}
                        </ul>
                    </div>
                    <div id="puntaje-juego" class="info-juego">
                        <h3>Puntaje:</h3>
                        {if $puntuacionJuego == 0}
                            <span>El juego aún no tiene puntuaciones</span>
                        {else}
                            <span>{$puntuacionJuego|string_format:"%.1f"}</span>
                            {while $puntuacionJuego >= 1}
                                &#x2605;
                                <label hidden="true">{$puntuacionJuego--}</label>
                            {/while}
                            {if $puntuacionJuego >= 0.5}
                                &#x2606;
                            {/if}
                        {/if}
                    </div>
                    <div id="comentarios" {if $errorComentario}err={$errorComentario}{/if}>
                        <p>{$producto.puntuacion}</p>
                    </div>
                {else}
                    <h1>Producto inexistente</h1>
                {/if}
            </div>
        </div>
        {include file = "footer.tpl"}   
    </body>
</html>
