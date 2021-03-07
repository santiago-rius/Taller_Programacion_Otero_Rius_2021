<!doctype html>
<html>
    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>TBD</title>
        <link rel="stylesheet" href="./css/estilo.css">
        <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="./js/main.js"></script>
    </head>
    
    <body>
        {include file = "encabezado.tpl" noMostrarCat=true}
        <div class="contenedor" id="background">
            {if $login == 1}
                {include file="login.tpl"}
            {else}
                {include file="registro.tpl"}
            {/if}
        </div>
        {include file="footer.tpl"}
    </body>
    
    
</html>