<?php

ini_set('display_errors, 1');
require_once("./libs/Smarty.class.php");


function getCategorias() {
    $conexion = abrirConexion();
    $sql = "SELECT * FROM generos";
    $resultado = $conexion->query($sql);
    $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $categorias;
}

function abrirConexion() {
    $usuario = "root";
    $clave = "root";
    
    $conexion = new PDO("mysql:host=localhost;dbname=catalogo_juegos", $usuario, $clave);
    
    return $conexion;
}

function getCategoria($id){
    $conexion = abrirConexion();
    $sql = "SELECT * FROM generos WHERE id = :id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam("id", $id, PDO::PARAM_INT);
    $sentencia->execute();
    $categoria = $sentencia->fetch(PDO::FETCH_ASSOC);
    
    return $categoria;
}


function guardarCategoria($nombre) {
    $conexion = abrirConexion();
    $sql = "INSERT INTO generos(nombre)VALUES(:nombre)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam("nombre", $nombre, PDO::PARAM_STR);
    $sentencia->execute();
}

function getProductosDeCategoria($idCategoria) {
    $juegos = array();
    if ($idCategoria == 1) {
        $juegos[] = array("id" => 1,
            "nombre" => "Overwatch",
            "descripcion" => "Overwatch is an online team-based game generally played as a first-person shooter. ... These modes generally are centered around sequentially securing control of points on the map, or escorting a payload between points on the map, with one team attacking while the other defends.",
            "precio" => "19",
            "imagen" => "OW_cover.jpg");
        $juegos[] = array("id" => 2,
            "nombre" => "Counter Strike",
            "descripcion" => "Vas a ragequitear",
            "precio" => "FREE",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 3,
            "nombre" => "Paladins",
            "descripcion" => "Como el Overwatch pero para pobres",
            "precio" => "FREE",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 4,
            "nombre" => "Call of Duty: Seoho Warfare",
            "descripcion" => "You will become a Oneus Stan",
            "precio" => "399",
            "imagen" => "no_cover.jpg");
    } else if ($idCategoria == 2) {
        $juegos[] = array("id" => 5,
            "nombre" => "The Elder Scrolls: Skyrim",
            "descripcion" => "Lleno de bugs pero it just works",
            "precio" => "15",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 6,
            "nombre" => "The Witcher 3: The wild hunt",
            "descripcion" => "Best game ever 10/10",
            "precio" => "15",
            "imagen" => "no_cover.jpg");
        $juegos[] = array("id" => 7,
            "nombre" => "Cyberpunk 2077",
            "descripcion" => "Not worth it, esta mas roto que el Skyrim (Judy is best romance btw)",
            "precio" => "too much",
            "imagen" => "no_cover.jpg");
    }
    return $juegos;
}

function getProducto($id){
    foreach (getCategorias() as $categoria){
        foreach(getProductosDeCategoria($categoria["id"]) as $aux){
            if($aux["id"]== $id) {
                return $aux;
            }
        }
    }
    
    return NULL;
}

function login($usuario, $clave) {
    if ($usuario == 'admin' && $clave == 'admin') {
        return array(
            "usuario" => "admin",
            "nombre" => "usuario de prueba"
        );
    };
    return NULL;
}

function logout() {
    unset($_SESSION['usuario']);
    session_destroy();
}

function getSmarty(){
        $mySmarty = new Smarty();
        $mySmarty->template_dir = 'Templates';
        $mySmarty->compile_dir = 'Templates_c';
        $mySmarty->config_dir = 'Config';
        $mySmarty->cache_dir = 'Cache';

    return $mySmarty;

}

function guardarJuego($nombre)
{
    $conexion = abrirConexion();
    
    $sql = "INSERT INTO juegos(:nombre, :id_genero, :poster, :puntuacion, :fecha_lanzamiento, :empresa, :visualizaciones, :url_video, :resumen) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])";
    
    //$sentencia = $conexion->prepare($sql);
    
}