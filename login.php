<!DOCTYPE html>
<?php
    require_once 'datos.php';
?>
<!--incluir para que al cambiar de categoria actually cambie-->
<html>
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="description" content="esto es una pagina web re loca">
        <title>Tu Tienda Online</title>
        <link rel="stylesheet" href="./css/ventas.css">

    </head>
    
    <body>
        <form action="doLogin.php" method="POST">
            Usuario: <input type="text" name="usuario"><br>
            Clave: <input type="password" name="clave"><br>
            <input type="submit" name="Ingresar"/>
            <?php 
                if(isset($_GET["err"])){
                    echo('<label>Usuario o clave incorrectos</label>');
                }
            ?>
        </form>
    </body>
    
    
</html>