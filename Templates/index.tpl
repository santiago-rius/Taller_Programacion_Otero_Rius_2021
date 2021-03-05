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
                    <input type="button" id="buscar" value="Buscar">

                    <label for="orderbylbl">Ordenar por</label>
                    <input list="orderby" name="orderby">
                        <datalist id="orderby">
                            <option id="fecha_lanzamiento" value="Lanzamiento.">
                            <option id="puntuacion" value="Puntaje.">
                            <option id="visualizaciones" value="Visualizaciones.">
                        </datalist> 
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
