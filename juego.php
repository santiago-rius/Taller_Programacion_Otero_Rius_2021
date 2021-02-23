<!DOCTYPE html>
<?php 
    ini_set('display_errors, 1');
    require_once './libs/Smarty.class.php';
    require_once 'datos.php';

    $prodId = 1;
    if(isset($_GET["id"])) {
        $prodId = $_GET["id"];
    }

    $producto = getProducto($prodId);
    
        
        $mySmarty = getSmarty();
        $mySmarty->assign("producto", $producto);
        $mySmarty->display("juego.tpl");
