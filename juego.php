<!DOCTYPE html>
<?php 
    ini_set('display_errors, 1');
    require_once 'datos.php';
    session_start();
    $prodId = 1;
    if(isset($_GET["id"])) {
        $prodId = $_GET["id"];
    }

    $producto = getProducto($prodId);
    
    $usuarioLogueado = NULL;
    if(isset($_SESSION['usuarioLogueado'])) {
        $usuarioLogueado = $_SESSION['usuarioLogueado'];
    }
    
    $categorias = getCategorias();
    
   // $comentarios = getComentariosDeJuego($prodId);
    
        $mySmarty = getSmarty();
        $mySmarty->assign("categorias", $categorias);
        $mySmarty->assign("producto", $producto);
        $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
        $mySmarty->display("juego.tpl");
       
