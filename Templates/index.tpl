<!DOCTYPE html>

<html>
    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
    
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>TBD</title>
        <link rel="stylesheet" href="./css/estilo.css">

    </head>
 
    <body>
        {include file = "encabezado.tpl"}
        <div id="menu">
            <a href="#">Página principal</a>
            {if ($usuarioLogueado)} 
                Hola, {$usuarioLogeado["nombre"]} <a target="_self" href="./doLogout.php">Cerrar sesión</a>
            {else}
                <a target="_self" href="./login.php">Inicio de sesión</a>
                        <a target="_blank" href="./login.html">Registro</a>
            {/if}
           
            <a href="#">Contacto</a>
        </div>
        <div id="categorias">
            <h2>Categorías</h2>
            <ul class="lista_lateral">
                {foreach from = $categorias item=cat} 
                    <li><a href="index.php?catId=
                    {$cat.id}" >
                    {$cat.nombre}
                    </a></li>
                {/foreach}
            </ul>
        </div>
        <div id="buscador">
            <label for="buscar">Ingresa tu busqueda</label>
            <input type="text">
            <input type="button" id="boton_buscar" value="Buscar">
        </div>
        <div id="juegos">
                {if isset($categoria)}
                    <h3>
                        {$categoria.nombre}
                    </h3>
                    {foreach from=$juego item=jueg}
                        {include file="tarjeta_juegos.tpl" jueg=$jueg}                        
                    {/foreach}
                {else}    
                    <h3> Categoría Inexistente</h3>
                {/if}
        </div>

    </body>

</html>
