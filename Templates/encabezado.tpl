<!DOCTYPE html>

<html>
    
    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">

    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>TBD</title>
        <link rel="stylesheet" href="./css/estilo.css">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    </head>

    <body>
        <div id="encabezado">
            <header>
                <h1><a href="index.php">Obligatorio Taller de programación</a></h1>
                <a href="index.php"><img src="./img/logito.png" alt="logo"></a>
                <h3>El mejor sitio de juegos pero es solo overwatch</h3>
                <div id="inicioDeSesion">
                    {if ($usuarioLogueado)} 
                    Hola, {$usuarioLogueado.nombre}<a target="_self" href="./doLogout.php"><br>Cerrar sesión</a>
                    {else}
                    <a target="_self" href="./login.php">Inicio de sesión</a><br>
                        <a target="_blank" href="./login.html">Registro</a>
                    {/if}
                </div>
            </header>
        </div>
                <div id="menu">
                    <div class="dropdown">
                        <button class="dropbtn">Categorías ▼</button>
                        <div class="dropdown-content">
                          {foreach from = $categorias item=cat}
                            <li><a href="index.php?catId={$cat.id}">{$cat.nombre}</a></li>
                        {/foreach}
                        </div>
                    </div>
                    <a href="index.php">Página principal</a>
                    {if ($usuarioLogueado)} 
                        <a href="./nuevoJuego.php">Nuevo Juego</a>
                    {/if}
                    <a href="#">Contacto</a>
                </div>
    </body>
</html>
  
        
   