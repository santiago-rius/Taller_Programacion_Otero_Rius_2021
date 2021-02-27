<!DOCTYPE html>
<?php
    ini_set('display_errors, 1');
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
        <?php
            session_start();
            $usuarioLogueado = NULL;
            if(isset($_SESSION['usuarioLogueado'])) {
                $usuarioLogueado = $_SESSION['usuarioLogueado'];
            }

            $categorias = getCategorias();

            $mySmarty = getSmarty();
            $mySmarty->assign("categorias", $categorias);
            $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
            $mySmarty->display("encabezado.tpl");
        ?>
        <div class="contenedor" id="background">
            <div id="login">
                <h2 id="titulo-login">Inicio de Sesión</h3>
                <form action="doLogin.php" method="POST">
                    <table>
                        <tr>
                          <td align="right">Usuario:</td>
                          <td align="left"><input type="text" name="usuario"></td>
                        </tr>
                        <tr>
                          <td align="right">Clave:</td>
                          <td align="left"><input type="password" name="clave"></td>
                        </tr>
                    </table>
                    <input id="boton-ingresar" type="submit" value="Ingresar"/>
                    <?php 
                        if(isset($_GET["err"])){
                            echo('<label id="mensaje-error">Usuario o clave incorrectos</label>');
                        }
                    ?>
                </form>
            </div>
        </div>
        <?php
            $mySmarty->display("footer.tpl");
        ?>
    </body>
    
    
</html>