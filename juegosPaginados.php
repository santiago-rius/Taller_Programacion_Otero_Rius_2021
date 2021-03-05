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

$categoria = getCategoria($catId);
if(isset($categoria)){
    setCookie('ultimaCategoria', $catId, time() + (60*60*24));
}

$pagina = 0;
if(isset($_GET["pag"])) {
    $pagina = $_GET["pag"];
}

$texto = "";
if(isset($_GET["texto"])) {
    $texto = $_GET["texto"];
}

$orden = "fecha_lanzamiento";
if(isset($_GET["orden"])) {
    $texto = $_GET["orden"];
}

$por = "ASC";
if(isset($_GET["por"])) {
    $texto = $_GET["por"];
}
$productos = getProductosDeCategoria($catId, $pagina, $texto, $orden, $por);
$ultimaPagina = ultimaPaginaProductos($catId, $texto);

$mySmarty->assign("pagina", $pagina);
$mySmarty->assign("categoria", $categoria);
$mySmarty->assign("ultimaPagina", $ultimaPagina);
$mySmarty->assign("juegos", $productos);
$mySmarty->display("juegos_paginados.tpl");