<!DOCTYPE html>
<?php 
    require_once 'datos.php';
?>
<html>
    <head>
        <meta charset="UTF-8" lang="es">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="esto es una pagina web re loca">
        <title>Tu Tienda Online</title>
        <link rel="stylesheet" href="./css/estilo.css">
    </head>
    <body>
        <?php
            $prodId = 1;
            if(isset($_GET["id"])) {
                $prodId = $_GET["id"];
            }
            
            $producto = getProducto($prodId);
            
            if (isset($producto)){
                echo("<h1>" . $producto["nombre"] . "</h1>");
                echo("<p>" . $producto["descripcion"] . "</p>");
                echo("<label> Precio U\$S" . $producto["precio"] . "</label>");
                echo('<img src="img/' . $producto["imagen"] . '" />');
            } else {
                echo("<h1>Producto inexistente</h1>");
            }
                   
        ?>
    </body>
</html>



