var pagina = 0;
var categoria = 1;
var texto = "";

function cargar() {
    $.ajax({
        url: "juegosPaginados.php",
        data: {
            catId: categoria,
            pag: pagina,
            texto: texto
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
    
    $("#juego-destacado").html
    
    cargar();
});