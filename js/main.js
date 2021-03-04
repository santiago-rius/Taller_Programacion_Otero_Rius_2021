var pagina = 0;
var categoria = 1;
var texto = "";

var clave = "";

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
    
    $("#juego-destacado").html;
    
    cargar();
});


$(document).ready(function()
{
    $("#clave").on("keyup", function(){
    var clave = $("clave").val();
    var lyn = 0;
    var mym = 0;
    var l = 0;
    
    if(clave.match(/(\D+\d)*/g))
    {
        lyn = 40; 
    }
    if(clave.match(/[A-Z]+[a-z]*/g))
    {
        mym = 40;
    }
    if(clave.length >= 10)
    {
        l = 40;
    }
    });
});



function prueba(){
    const s = "sucess";
}

$("textodeprueba").click(function(){
    prueba();
})