<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="esto es una pagina web re loca">
        <title>Tu Tienda Online</title>
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        {if (isset($producto))}
            <h1>{$producto.nombre}</h1>
            <p>{$producto.descripcion}</p>
            <label> Precio U$S {$producto.precio}</label>
            <img src="img/{$producto.imagen}"/>
            {else}
                <h1>Producto inexistente</h1>
            {/if}
                   
    </body>
</html>
