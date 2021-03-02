<?php

require_once 'datos.php';
ini_set("display_errors", 1);
error_reporting(E_ERROR);

$mySmarty = getSmarty();

$catId = 1;
                        
if(isset($_GET["catId"])) {
    $catId = $_GET["catId"];
} else if(isset($_COOKIE["ultimaCategoria"])) {
    $catId = $_COOKIE["ultimaCategoria"];
}

$pagina = 0;
if(isset($_GET["pag"])) {
    $pagina = $_GET["pag"];
}

$texto = "";
if(isset($_GET["texto"])) {
    $texto = $_GET["texto"];
}

$categoria = getCategoria($catId);
if(isset($categoria)){
    setCookie('ultimaCategoria', $catId, time() + (60*60*24));
}

$mySmarty->assign("pagina", $pagina);
$mySmarty->assign("categoria", $categoria);
$mySmarty->assign("ultimaPagina", ultimaPaginaProductos($catId, $texto));
$mySmarty->assign("productos", getProductosDeCategoria($catId, $pagina, $texto));
$mySmarty->display("juegos_paginados.tpl");