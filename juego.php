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
    
    sumarVisualizacion($prodId);
    
    $usuarioLogueado = NULL;
    if(isset($_SESSION['usuarioLogueado'])) {
        $usuarioLogueado = $_SESSION['usuarioLogueado'];
    }
    
    $errorComentario = isset($_GET["err"]);
    
    $categorias = getCategorias();
    
    $puntuacionJuego = calcularPuntuacionDeJuego($prodId);
    $consolas = getconsolasDeJuego($prodId);
    
    
        $mySmarty = getSmarty();
        $mySmarty->assign("categorias", $categorias);
        $mySmarty->assign("producto", $producto);
        $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
        $mySmarty->assign("errorComentario", $errorComentario);
        $mySmarty->assign("puntuacionJuego", $puntuacionJuego);
        $mySmarty->assign("consolas", $consolas);
        $mySmarty->display("juego.tpl");
       
