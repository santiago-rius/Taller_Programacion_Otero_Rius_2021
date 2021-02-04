<!DOCTYPE html>

<?php
require_once 'datos.php';
?>

<html>

    <link rel="icon" href="./img/logito_invertido.png" type="image/gif" sizes="16x16">
    
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>TBD</title>
        <link rel="stylesheet" href="./css/estilo.css">

    </head>
    <body>
        <div class="contenedor" id="encabezado">
            <header>
                <h1>Belugabi Gamez</h1>
                <img src="./img/logito.png" alt="logo">
                <h3>El mejor sitio de juegos pero es solo overwatch</h3>
            </header>
        </div>
        <div id="menu">
            <a href="#">Página principal</a>
            <?php
            session_start(); //si ya hay una sesion iniciada no cambia el id
            if (isset($_SESSION['usuarioLogueado'])) {
                $usuario = $_SESSION['usuarioLogueado'];
                echo('Hola, ' . $usuario["nombre"] . '<a target="_self" href="./doLogout.php">Cerrar sesión</a>');
            } else {
                echo('<a target="_self" href="./login.php">Inicio de sesión</a>'
                        . '<a target="_blank" href="./login.html">Registro</a>');
            }
            ?>
            <a href="#">Contacto</a>
        </div>
        <div id="categorias">
            <h2>Categorías</h2>
            <ul class="lista_lateral">
                <?php
                foreach (getCategorias() as $categoria) {
                    echo('<li><a href="index.php?catId=' .
                    $categoria["id"]
                    . '">' .
                    $categoria["nombre"] .
                    '</a></li>');
                }
                ?>
            </ul>
        </div>
        <div id="buscador">
            <label for="buscar">Ingresa tu busqueda</label>
            <input type="text">
            <input type="button" id="boton_buscar" value="Buscar">
        </div>
        <div id="juegos">
            <h3>
                <?php
                
                $catId = 1;
                
                if (isset($_GET['catId'])) {
                    $catId = $_GET['catId'];
                } else if (isset($_COOKIE['ultimaCategoria'])) {
                    $catId = $_COOKIE['ultimaCategoria'];
                }
                
                $categoria = getCategoria($catId);
                
                if (isset($categoria)) {
                    setCookie('ultimaCategoria', $catId ,time() + (60 * 60 * 24));
                    echo $categoria["nombre"];
                } else {
                    echo "Categoria inexistente";
                }
                ?>
            </h3>
            <?php
            foreach (getProductosDeCategoria($catId) as $producto) {
                echo('<div class="juego">');
                echo('<img src="img/' . $producto["imagen"] . '" />');
                echo('<a href="juego.php?id=' .
                $producto["id"] . '"');
                echo('<span class="nombre-producto">' .
                $producto["nombre"] . '</span></a>');
                echo('<p>' . $producto["descripcion"] . '</p>');
                echo('<span class="precio-producto">' . 'U$S '.
                $producto["precio"] . '</span>');
                echo('</div>');
            }
            ?>
        </div>
    </body>

</html>