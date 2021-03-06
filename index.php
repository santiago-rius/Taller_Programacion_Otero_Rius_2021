<!DOCTYPE html>

<?php

require_once 'datos.php';
    ini_set('display_errors', 1);
    session_start();
    $mySmarty = getSmarty();
    
    $catId = 1;
                        
    if(isset($_GET["catId"])) {
        $catId = $_GET["catId"];
    } else if(isset($_COOKIE["ultimaCategoria"])) {
        $catId = $_COOKIE["ultimaCategoria"];
    }

    $categoria = getCategoria($catId);
    if(isset($categoria)){
        setCookie('ultimaCategoria', $catId, time() + (60*60*24));
    }
    
    $usuarioLogueado = NULL;
    if(isset($_SESSION['usuarioLogueado'])) {
        $usuarioLogueado = $_SESSION['usuarioLogueado'];
    }
    
    $categorias = getCategorias();

    
    $juegoDestacado = getJuegoConMasComentarios();
    $consolas = getConsolas();
    
    if(usuarioEsAdmin($usuarioLogueado))
    {
        $usuarioLogueado[] = 1;
    }

    $mySmarty->assign("consolas", $consolas);
    $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
    $mySmarty->assign("categorias", $categorias);
    $mySmarty->assign("juegoDestacado", $juegoDestacado);
    $mySmarty->assign("categoria", $categoria);
    $mySmarty->display("index.tpl");

