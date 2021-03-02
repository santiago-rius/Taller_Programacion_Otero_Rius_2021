<!doctype html>
<html>
    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
    <head>
        <title>Ingresar Juego</title>
        <meta charset="UTF-8" lang="es">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        {include file = "encabezado.tpl"}
        <div class="contenedor">
            <div id="divIngresoJuego">
                <form action="doGuardarJuego.php" method="POST" id="ingresoJuego" enctype="multipart/form-data">
                    Nombre:
                    <input type="text" name="nombre" /><br>
                    Descripción:
                    <input type="text" name="descripcion" /><br>
                    Fecha de lanzamiento:
                    <input type="date" name="fechaLanzamiento"/><br>
                     Imagen:
                    <input type="url" name="imagen" pattern="https?://(www.)?[-a-zA-Z0-9@:%.+~#=] { 2,256 } .[a-z] { 2,4 } \b([-a-zA-Z0-9@:%+.~#?&//=]*)(.jpg|.png|.gif)"/> <br>
                    Desarrollador:
                    <input type="text" name="desarrollador" /><br>
                    Lista de consolas para las que está disponible: <br>
                        <select multiple name="consolas">
                            {foreach from = $consolas item=con}
                                <option value={$con.id}>{$con.nombre}</option>
                            {/foreach}
                        </select> <br>
                    Género:
                    <input list="generos" name="generos">
                        <datalist id="generos">
                        {foreach from = $categorias item=cat}
                            <option value={$cat.id}>{$cat.nombre}</option>
                        {/foreach}
                        </datalist> <br>
                    URL del trailer:
                    <input type="url" name="trailer"/><br>
                    <input type="submit" value="Guardar" />
                </form>
            </div>
        </div>
        {include file = "footer.tpl"}
    </body>
</html>