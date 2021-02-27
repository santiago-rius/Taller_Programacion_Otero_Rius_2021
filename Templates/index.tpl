<!DOCTYPE html>

<html>
    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
    
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>TBD</title>
        <link rel="stylesheet" href="./css/estilo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
 
    <body>
        <div id ="page-container">
            <div class="contenedor">
                {include file = "encabezado.tpl"}

                <div id="buscador">
                    <label for="buscar">Ingresa tu búsqueda</label>
                    <input type="text">
                    <input type="button" id="boton_buscar" value="Buscar">
                </div>
                <div id="juego-destacado">
                    <h3>Juego Destacado</h3>
                    <h3>⭐⭐⭐⭐⭐</h3>
                    {$juego = $juegos[0]}
                    {include file="tarjeta_juego.tpl" jueg=$juego} 
                </div>
                <div id="juegos">
                        {if isset($categoria)}
                            <h3>
                                {$categoria.nombre}
                            </h3>
                            {foreach from=$juegos item=jueg}
                                {include file="tarjeta_juego.tpl" jueg=$jueg}
                            {/foreach}
                        {else}    
                            <h3> Categoría Inexistente</h3>
                        {/if}
                </div>
            </div>
            {include file = "footer.tpl"}
        </div>
    </body>

</html>
