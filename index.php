<!DOCTYPE html>

<?php

require_once 'datos.php';
    ini_set('display_errors', 1);
    session_start();
    $mySmarty = getSmarty();
    
    
    $usuarioLogueado = NULL;
    if(isset($_SESSION['usuarioLogueado'])) {
        $usuarioLogueado = $_SESSION['usuarioLogueado'];
    }
    
    $categorias = getCategorias();

    
    $juegoDestacado = getProducto(14);
    $juegoDestacado2 = getJuegoConMasComentarios();
    
    $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
    $mySmarty->assign("categorias", $categorias);
    $mySmarty->assign("juegoDestacado", $juegoDestacado2);
    //$mySmarty->assign("categoria", $categoria);
    //$mySmarty->assign("juegos", $juegos);
    $mySmarty->display("index.tpl");

?>

