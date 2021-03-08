<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="./js/main.js"></script>
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        {include file = "encabezado.tpl" noMostrarCat=true}
        <div class="contenedor">
            <form method='POST' action='./doBorrarComentario.php'>
                <div id="comentarios-lista">
                    {foreach from=$comentarios item=com}
                        {include file="tarjeta_comentario.tpl" comentario=$com}
                        <button class="boton-chico boton-borrar-comentario"  name="boton-borrar-comentario" value="{$com.id}" type="submit">Borrar</button>
                    {/foreach}
                </div>
            </form>
        </div>
        {include file = "footer.tpl"}   
    </body>
</html>
