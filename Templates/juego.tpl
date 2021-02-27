<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
        <meta charset="UTF-8" lang="es">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <meta name="description" content="esto es una pagina web re loca">
        {if (isset($producto))}
            <title>{$producto.nombre}</title>
        {else}
                <h1>Producto inexistente</h1>
        {/if}
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        {include file = "encabezado.tpl"}
        <div class="contenedor">
            <div id="pagina-juego">
                {if (isset($producto))}
                    <h1>{$producto.nombre}</h1>
                    <div class="media">
                        <iframe width="600" height="390" src="https://www.youtube.com/embed/FqnKB22pOC0"></iframe>
                        <img src="img/{$producto.imagen}"/>
                    </div>
                    
                    <p>{$producto.descripcion}</p>
                    <label> Precio U$S {$producto.precio}</label>
                    
                {else}
                        <h1>Producto inexistente</h1>
                {/if}
            </div>
        </div>
        {include file = "footer.tpl"}   
    </body>
</html>
