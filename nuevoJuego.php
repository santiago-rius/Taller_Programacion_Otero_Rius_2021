<?php
    require_once 'datos.php';
    ini_set('display_errors, 1');
    require_once 'datos.php';
    session_start();
    
    
    $usuarioLogueado = NULL;
    if(isset($_SESSION['usuarioLogueado'])) {
        $usuarioLogueado = $_SESSION['usuarioLogueado'];
    }
    
    $categorias = getCategorias();
    
    $consolas  = getConsolas();
        
        $mySmarty = getSmarty();
        $mySmarty->assign("categorias", $categorias);
        $mySmarty->assign("usuarioLogueado", $usuarioLogueado);
        $mySmarty->assign("consolas", $consolas);
        $mySmarty->display('nuevo_juego.tpl');
