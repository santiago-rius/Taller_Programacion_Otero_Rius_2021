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

function getProductosDeCategoria($idCategoria, $orden, $por, $pagina=0, $texto="") {
    $size = 8;
    $offset = $pagina * $size;
    $conexion = abrirConexion();   
    
    $params = array(
        array("idCategoria", $idCategoria, "int"),
        array("texto", '%'.$texto.'%', "string"),
        array("offset", $offset, "int"),
        array("size", $size, "int")
        );
    $sql = "SELECT * FROM juegos WHERE id_genero = :idCategoria AND nombre LIKE :texto ORDER BY ".$por." ".$orden." LIMIT :offset, :size";
    $conexion->consulta($sql, $params);
    return $conexion->restantesRegistros();
}

function ultimaPaginaProductos($catId, $texto, $por, $orden) {
    $conexion = abrirConexion();
    
    $params = array(
        array("idCategoria", $catId, "int"),
        array("texto", '%'.$texto.'%', "string"),
        array("por", $por, "string"),
        array("orden", $orden, "string")
        );
    
    $sql = "SELECT count(*) as total FROM juegos WHERE id_genero = :idCategoria AND nombre LIKE :texto ORDER BY :por :orden";
    $conexion->consulta($sql, $params);
    $size = 8;
    $fila = $conexion->siguienteRegistro();
    $pagina = ceil($fila["total"] / $size) - 1;
    return $pagina;
}




function ultimaPaginaComentarios($juego) {
   $conexion = abrirConexion();
    
    $params = array(
        array("id", $juego, "int")
    );
    
    $sql = "SELECT COUNT(*) as total
        FROM usuarios u, comentarios c, juegos j 
        WHERE j.id = :id
        AND c.id_usuario = u.id 
        AND c.id_juego =  :id
        ORDER BY c.fecha DESC " ;
    
    $conexion->consulta($sql, $params);
    $size = 5;
    $fila = $conexion->siguienteRegistro();
    $pagina = ceil($fila["total"] / $size) - 1;
    return $pagina;
}

function getProducto($id){
    foreach (getCategorias() as $categoria){
        foreach(getTodosProductosDeCategoria($categoria["id"]) as $aux){
            if($aux["id"]== $id) {
                return $aux;
            }
        }
    }
    
    return NULL;
}

function getTodosProductosDeCategoria($idCategoria) {
    $conexion = abrirConexion();
    
    $params = array(
        array("idCategoria", $idCategoria, "int")
        );
    
    $sql = "SELECT * FROM juegos WHERE id_genero = :idCategoria";
    $conexion->consulta($sql, $params);
    return $conexion->restantesRegistros();
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
                        $generos, $trailer)
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

function getComentariosDeJuego($juego){
    $conexion = abrirConexion();
    
    $params = array(
        array("id", $juego, "int")
    );
    
    $sql = "SELECT u.alias, c.puntuacion, c.texto, c.fecha 
        FROM usuarios u, comentarios c, juegos j 
        WHERE j.id = :id
        AND c.id_usuario = u.id 
        AND c.id_juego =  :id
        ORDER BY c.fecha DESC";
    
    $conexion->consulta($sql, $params);
    $resultado = $conexion->restantesRegistros();
    return $resultado;
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

function getConsolas(){
    $conexion = abrirConexion();
    
    $sql = "SELECT * FROM consolas";
    $conexion->consulta($sql);
    $consolas = $conexion->restantesRegistros();
    
    return $consolas;
}

function guardarConsolasParaJuego($id, $consolas){
    $conexion = abrirConexion();
    
    foreach ($consolas as $con)
    {
        $params = array(
            array("id_juego", $id, "int"),
            array("id_consola", $con, "int")
        );
        $sql = "INSERT INTO juegos_consolas(id_juego, id_consola) VALUES (:id_juego, :id_consola)";
        $conexion->consulta($sql, $params);
        $conexion->ultimoIdInsert();
    }
}

function sumarVisualizacion($juego)
{
    $conexion = abrirConexion();
    
    $params = array(
            array("id", $juego, "int"),
        );
    $sql = "SELECT visualizaciones FROM juegos WHERE id = :id";
    
    $conexion->consulta($sql, $params);
    $visualizaciones = $conexion->siguienteRegistro();
    echo($visualizaciones["visualizaciones"]);
    $valor= $visualizaciones["visualizaciones"] + 1;
    echo($visualizaciones["visualizaciones"]);
    
    $params2 = array(
            array("id", $juego, "int"),
            array("visualizaciones", $valor, "int")
        );
    
    $sql2 = "UPDATE juegos SET visualizaciones = :visualizaciones WHERE id=:id";
    
    $conexion->consulta($sql2, $params2);
}