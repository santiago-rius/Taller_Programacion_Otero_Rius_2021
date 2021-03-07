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
        {include file = "encabezado.tpl" noMostrarCat=true}
        <div class="contenedor">
            <div id="divIngresoJuego">
                <form action="doGuardarJuego.php" method="POST" id="ingresoJuego" enctype="multipart/form-data">
                    <h2>Ingreso de nuevo juego</h2>
                    <table>
                        <tr>
                            <td align="right">Nombre:</td>
                            <td align="left"><input type="text" name="nombre" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Descripción:</td>
                            <td align="left"><textarea id="descripcion-juego" name="descripcion" required/></textarea></td>
                        </tr>
                        <tr>
                            <td align="right">Fecha de lanzamiento:</td>
                            <td align="left"><input type="date" name="fechaLanzamiento" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Imagen:</td>
                            <td align="left"><input type="url" name="imagen" pattern="https?://(www.)?[-a-zA-Z0-9@:%.+~#=] { 2,256 } .[a-z] { 2,4 } \b([-a-zA-Z0-9@:%+.~#?&//=]*)(.jpg|.png|.gif)" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Desarrollador:</td>
                            <td align="left"><input type="text" name="desarrollador" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Lista de consolas para las que está disponible:
                                <h6>Puede seleccionar varias usando Ctrl+click</h6></td>
                            <td align="left"><select multiple name="consolas[]" required>
                                {foreach from = $consolas item=con}
                                    <option value={$con.id}>{$con.nombre}</option>
                                {/foreach}
                            </select></td>
                        </tr>
                        <tr>
                            <td align="right">Género:</td>
                            <td align="left"><input list="generos" name="generos" required>
                            <datalist id="generos">
                            {foreach from = $categorias item=cat}
                                <option value={$cat.id}>{$cat.nombre}</option>
                            {/foreach}
                            </datalist></td>
                        </tr>
                        <tr>
                            <td align="right">URL del trailer:</td>
                            <td align="left"><input type="url" name="trailer" value="https://www.youtube.com/embed/ScMzIvxBSi4"/></td>
                        </tr>
                    </table>
                    <input type="submit" value="Guardar" />
                </form>
            </div>
        </div>
        {include file = "footer.tpl"}
    </body>
</html>