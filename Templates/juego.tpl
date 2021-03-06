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
        {include file = "encabezado.tpl"}
        <div class="contenedor" id>
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
                    <div id="comentarios">
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
