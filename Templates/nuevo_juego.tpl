<!doctype html>
<html>
    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
    <head>
        <title>Ingresar Juego</title>
        <meta charset="UTF-8" lang="es">
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        {include file = "encabezado.tpl"}
        <div id="divIngresoJuego">
            <form action="doGuardarJuego.php" method="POST" id="ingresoJuego">
                Nombre:
                <input type="text" name="nombre" /><br>
                Descripción:
                <input type="text" name="descripcion" /><br>
                Fecha de lanzamiento:
                <input type="date" name="fechaLanzamiento"/><br>
                Imagen:
                <input type="file" name="imagen" accept="image/x-png,image/gif,image/jpeg" /> <br>
                Desarrollador:
                <input type="text" name="desarrollador" /><br>
                Lista de consolas para las que está disponible: <br>
                PC: <input type="checkbox" name="consolaPC"><br>
                PS5: <input type="checkbox" name="consolaPS5"><br>
                Género:
                <input list="generos" name="generos">
                    <datalist id="generos">
                      <option value="FPS">
                      <option value="RPG">
                      <option value="RTS">
                      <option value="Sports">
                      <option value="Seoho">
                    </datalist> <br>
                URL del trailer:
                <input type="url" name="urlVideo" /><br>
                <input type="submit" value="Guardar" />
            </form>
        </div>
    </body>
</html>