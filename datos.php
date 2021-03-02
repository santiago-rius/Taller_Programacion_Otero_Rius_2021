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
    $size = 3;
    $offset = $pagina * $size;
    $conexion = abrirConexion();
    
    $params = array(
        array("idCategoria", $idCategoria, "int"),
        array("texto", '%'.$texto.'%', "string"),
        array("offset", $offset, "int"),
        array("size", $size, "int")
        );
    
    $sql = "SELECT * FROM juegos WHERE id = :idCategoria AND nombre LIKE :texto LIMIT :offset, :size";
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
     $conexion = abrirConexion2();
    
    $params = array(
        array("idCategoria", $catId, "int"),
        array("texto", '%'.$texto.'%', "string")
        );
    
    $sql = "SELECT count(*) as total FROM juegos WHERE id = :idCategoria AND nombre LIKE :texto";
    $conexion->consulta($sql, $params);
    $size = 3;
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

function guardarJuego($nombre, $descripcion, $fechaLanzamiento, $imagen, $desarrollador,
                        $consolas, $generos, $trailer)
{
    $conexion = abrirConexion();
    
// $sql = "INSERT INTO juegos(:nombre, :id_genero, :poster, :puntuacion, :fecha_lanzamiento, :empresa, :visualizaciones, :url_video, :resumen) "
   //         . "VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])";
    
    $sql = "INSERT INTO juegos(nombre, id_genero, poster, fecha_lanzamiento, empresa, url_video, resumen) "
            . "VALUES (:nombre, :generos, :imagen, :fechaLanzamiento, :desarrollador, :trailer, :descripcion)";
    echo('prueba');
    echo('holis <br>');
echo($nombre.'<br>');
echo($descripcion.'<br>');
echo($fechaLanzamiento.'<br>');
echo($imagen.'<br>');
echo($generos.'<br>');
echo($desarrollador.'<br>');
echo($trailer.'<br>');
echo($consolas.'<br>');
echo($sql);
    $conexion->consulta($sql, array(
            array("nombre", $nombre, "string"),
            array("generos", $generos, "int"),
            array("imagen", $imagen, "string"),
            array("fechaLanzamiento", $fechaLanzamiento, "date"),
            array("desarrollador", $desarrollador, "string"),
            array("trailer", $trailer, "string"),
            array("descripcion", $descripcion, "string")));
    echo('<br>'.$conexion->ultimoError());
    return ($conexion->ultimoIdInsert());
    //$sentencia = $conexion->prepare($sql);
    
}