<?php
require_once 'class.Conexion.BD.php';
ini_set('display_errors, 1');
require_once("./libs/Smarty.class.php");



    error_reporting(E_ERROR);

function getCategorias() {
    $conexion = abrirConexion();
    
    $sql = "SELECT * FROM generos";
    $conexion->consulta($sql);
    
     return $conexion->restantesRegistros();
}

function abrirConexion() {
    $usuario = "root";
    $clave="root";
    
    $conexion = new ConexionBD("mysql", "localhost", "catalogo_juegos", $usuario, $clave);
    
    $conexion->conectar();
    
    return $conexion;
}

function getCategoria($id){
    $conexion = abrirConexion();
    $sql = "SELECT * FROM generos WHERE id = :id";
    $conexion->consulta($sql, array(array("id", $id, "int")));
    return $conexion->siguienteRegistro();
}


function guardarCategoria($nombre) {
    $conexion = abrirConexion();
    $sql = "INSERT INTO generos(nombre)VALUES(:nombre)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam("nombre", $nombre, PDO::PARAM_STR);
    $sentencia->execute();
}

function getProductosDeCategoria($idCategoria, $pagina = 0, $texto = '') {
    $size = 8;
    $offset = $pagina * $size;
    $conexion = abrirConexion();
    
    $params = array(
        array("idCategoria", $idCategoria, "int"),
        array("texto", '%'.$texto.'%', "string"),
        array("offset", $offset, "int"),
        array("size", $size, "int")
        );
    
    $sql = "SELECT * FROM juegos WHERE id_genero = :idCategoria AND nombre LIKE :texto LIMIT :offset, :size";
    $conexion->consulta($sql, $params);
    return $conexion->restantesRegistros();
//    $juegos = array();
//    if ($idCategoria == 1) {
//        $juegos[] = array("id" => 1,
//            "nombre" => "Overwatch",
//            "descripcion" => "Overwatch is an online team-based game generally played as a first-person shooter. ... These modes generally are centered around sequentially securing control of points on the map, or escorting a payload between points on the map, with one team attacking while the other defends.",
//            "precio" => "19",
//            "imagen" => "OW_cover.jpg");
//        $juegos[] = array("id" => 2,
//            "nombre" => "Counter Strike",
//            "descripcion" => "Vas a ragequitear",
//            "precio" => "FREE",
//            "imagen" => "no_cover.jpg");
//        $juegos[] = array("id" => 3,
//            "nombre" => "Paladins",
//            "descripcion" => "Como el Overwatch pero para pobres",
//            "precio" => "FREE",
//            "imagen" => "no_cover.jpg");
//        $juegos[] = array("id" => 4,
//            "nombre" => "Call of Duty: Seoho Warfare",
//            "descripcion" => "You will become a Oneus Stan",
//            "precio" => "399",
//            "imagen" => "no_cover.jpg");
//    } else if ($idCategoria == 2) {
//        $juegos[] = array("id" => 5,
//            "nombre" => "The Elder Scrolls: Skyrim",
//            "descripcion" => "Lleno de bugs pero it just works",
//            "precio" => "15",
//            "imagen" => "no_cover.jpg");
//        $juegos[] = array("id" => 6,
//            "nombre" => "The Witcher 3: The wild hunt",
//            "descripcion" => "Best game ever 10/10",
//            "precio" => "15",
//            "imagen" => "no_cover.jpg");
//        $juegos[] = array("id" => 7,
//            "nombre" => "Cyberpunk 2077",
//            "descripcion" => "Not worth it, esta mas roto que el Skyrim (Judy is best romance btw)",
//            "precio" => "too much",
//            "imagen" => "no_cover.jpg");
//    }
//    return $juegos;
}

function ultimaPaginaProductos($catId, $texto) {
    $conexion = abrirConexion();
    
    $params = array(
        array("idCategoria", $catId, "int"),
        array("texto", '%'.$texto.'%', "string")
        );
    
    $sql = "SELECT count(*) as total FROM juegos WHERE id_genero = :idCategoria AND nombre LIKE :texto";
    $conexion->consulta($sql, $params);
    $size = 8;
    $fila = $conexion->siguienteRegistro();
    $pagina = ceil($fila["total"] / $size) - 1;
    return $pagina;
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

function login($email, $clave) {
    $conexion = abrirConexion();
    
    $params = array(
        array("email", $email, "string"),
        array("password", $clave, "string")
    );
    
    $sql = "SELECT alias, email FROM usuarios WHERE email LIKE :email AND password LIKE :password";
    $conexion->consulta($sql, $params);
    $resultado = $conexion->siguienteRegistro();
    return $resultado;
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

function guardarJuego($nombre, $descripcion, $fechaLanzamiento, $imagen, $desarrollador,
                        $consolas, $generos, $trailer)
{
    $conexion = abrirConexion();
    $sql = "INSERT INTO juegos(nombre, id_genero, poster, fecha_lanzamiento, empresa, url_video, resumen) "
            . "VALUES (:nombre, :generos, :imagen, :fechaLanzamiento, :desarrollador, :trailer, :descripcion)";
    $conexion->consulta($sql, array(
            array("nombre", $nombre, "string"),
            array("generos", $generos, "int"),
            array("imagen", $imagen, "string"),
            array("fechaLanzamiento", $fechaLanzamiento, "date"),
            array("desarrollador", $desarrollador, "string"),
            array("trailer", $trailer, "string"),
            array("descripcion", $descripcion, "string")));
    return ($conexion->ultimoIdInsert());
    
}

function getJuegoConMasComentarios(){
    $conexion = abrirConexion();
    
    
    $sql = "SELECT id_juego
            FROM (

            SELECT id_juego, COUNT( * ) AS c
            FROM comentarios
            GROUP BY id_juego
            ORDER BY c DESC
            LIMIT 1
            ) AS c1";
    
    $conexion->consulta($sql);
    $id = $conexion->siguienteRegistro();
    $juego = getProducto($id["id_juego"]);
    
    return $juego;
}

function registrarUsuario($usuario, $clave, $email){
    $conexion = abrirConexion();
    
    $usuarios = getCorreosUsuarios();
    $estaRegistrado = false;
    foreach ($usuarios as $alias)
    {
        if($alias['email'] == $email)
        {
            $estaRegistrado = true;
        }
    }
    
    if(!$estaRegistrado)
    {
        $sql = "INSERT INTO usuarios(email, alias, password) VALUES (:email,:alias,:password)";
    
     $conexion->consulta($sql, array(
            array("email", $email, "string"),
            array("alias", $usuario, "string"),
            array("password", $clave, "string")
         ));
        return ($conexion->ultimoIdInsert());
    }
    else
    {
        return !$estaRegistrado;
    }
    
}

function getCorreosUsuarios(){
    $conexion = abrirConexion();
    
    $sql = "SELECT email FROM usuarios";
    $conexion->consulta($sql);
    $usuarios = $conexion->restantesRegistros();
    
    return $usuarios;
}