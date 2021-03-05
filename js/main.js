var pagina = 0;
var categoria = 1;
var texto = "";
var enOrden = "";
var ordenarPor = "";
var id = 1;
var paginaComentarios = 0;

var clave = "";

function cargar() {
    $.ajax({
        url: "juegosPaginados.php",
        data: {
            catId: categoria,
            pag: pagina,
            texto: texto,
            orden: enOrden,
            por: ordenarPor
        },
        dataType: "html"
    }).done(function(html){
        $('#juegos').html(html);
        
        $("#anterior").click(function(){
            pagina -= 1;
            cargar();
        });
        
        $("#siguiente").click(function(){
            pagina += 1;
            cargar();
        });
    }).fail(function(){
        alert('Error');
    });
}

$(document).ready(function(){
    $('.categoria').click(function(){
        categoria = $(this).attr('catId');
        cargar();
    });
    
    $('#buscar').click(function(){
        texto = $("#texto").val();
        pagina = 0;
        cargar();
    });
    
    $('#texto').on("keyup", function(){
        texto = $("#texto").val();
        pagina = 0;
        cargar();
    });
    
    $("#juego-destacado").html;
    
    cargar();
});

function cargarComentarios() {
    
    $.ajax({
        url: "comentariosPaginados.php",
        data: {
            id: id,
            pag: paginaComentarios
        },
        dataType: "html"
    }).done(function(html){
        $('#comentarios').html(html);
        
        $("#comentarios-ant").click(function(){
            paginaComentarios -= 1;
            cargarComentarios();
        });
        
        $("#comentarios-sig").click(function(){
            paginaComentarios += 1;
            cargarComentarios(); 
        });
    }).fail(function(){
        alert('Error');
    });
}