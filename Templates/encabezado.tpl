<!DOCTYPE html>

<html>

    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">

    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>Obligatorio</title>
        <link rel="stylesheet" href="./css/estilo.css">
        <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="./js/main.js"></script>
    </head>

    <body>
        <div id="encabezado">
            <header>
                <h1><a href="index.php">Obligatorio Taller de programación</a></h1>
                <a href="index.php"><img src="./img/logito.png" alt="logo"></a>
                <h3>Tu catálogo favorito de videojuegos.</h3>
                <div id="inicioDeSesion">
                    {if ($usuarioLogueado)} 
                        Hola, {$usuarioLogueado.alias}<a target="_self" href="./doLogout.php"><br>Cerrar sesión</a>
                        {else}
                        <a target="_self" href="./login.php">Inicio de sesión</a><br>
                        <a target="_self" href="./registro.php">Registro</a>
                    {/if}
                </div>
            </header>
        </div>
        <div id="menu">
            {if not $noMostrarCat}
                <div class="dropdown">
                    <button class="dropbtn">Categorías ▼</button>
                    <div class="dropdown-content">
                        <li><a class="categoria" catId="0" href="#">Todas</a></li> 
                        {foreach from = $categorias item=cat}
                            <li><a class="categoria" catId="{$cat.id}" href="#">{$cat.nombre}</a></li>
                            {/foreach}
                    </div>
                </div>    
            {/if}

            <a href="index.php">Página principal</a>
            {if ($usuarioLogueado)} 
                
                {if $usuarioLogueado[0]==1}
                    <a href="./revisionComentarios.php">Revisar Comentarios</a>
                    <a href="./nuevoJuego.php">Nuevo Juego</a>
                {/if}
            {/if}
        </div>
    </body>
</html>


