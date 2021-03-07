var pagina = 0;
var categoria = 1;
var texto = "";
var enOrden = "ASC";
var ordenarPor = "fecha_lanzamiento";
var idJuego = 1;
var paginaComentarios = 0;
var consola = 0;

var clave = "";

function cargar() {
    $.ajax({
        url: "juegosPaginados.php",
        data: {
            catId: categoria,
            pag: pagina,
            texto: texto,
            orden: enOrden,
            por: ordenarPor,
            con: consola
        },
        dataType: "html"
    }).done(function (html) {
        $('#juegos').html(html);

        $("#anterior").click(function () {
            pagina -= 1;
            cargar();
        });

        $("#siguiente").click(function () {
            pagina += 1;
            cargar();
        });

    }).fail(function () {
        alert('Error');
    });
}

$(document).ready(function () {
    $('.categoria').click(function () {
        categoria = $(this).attr('catId');
        cargar();
    });

    $(".por").click(function () {
        etiquetaOrden(this);
    });

    $(".consola").click(function () {
        etiquetaOrdenConsola(this);
    });


    $('#buscar').click(function () {
        texto = $("#texto").val();
        pagina = 0;
        $("#filtrado").html("Resultado de la búsqueda: " + texto);
        cargar();
    });

    $('#texto').on("keyup", function () {
        texto = $("#texto").val();
        pagina = 0;
        $("#filtrado").html("Resultado de la búsqueda: " + texto);
        cargar();
    });

    $(".consola").click(function () {
        consola = $(this).attr('consola');
        cargar();
    });

    $(".boton-borrar-comentario").click(function () {
        id_comentario = $(this).attr("id_comentario");
        borrarComentario();
    });

    idJuego = $("#pagina-juego").attr("idJuego");


    $("#juego-destacado").html;


//    function getUrlParameter() {
//        var sPageURL = window.location.search.substring(1),
//                sURLVariables = sPageURL.split('?'),
//                sParameterName,
//                i,
//                sParam = "id";
//        for (i = 0; i < sURLVariables.length; i++) {
//            sParameterName = sURLVariables[i].split('=');
//
//            if (sParameterName[0] === sParam) {
//                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
//            }
//        }
//        return false;
//    }
//    ;
//    idJuego = getUrlParameter();

//    // Delete 
//    $('.boton-borrar-comentario').click(function () {
//        var el = this;
//        var deleteid = $(this).data('#id_comentario');
//
//        var confirmalert = confirm("Are you sure?");
//        if (confirmalert == true) {
//            // AJAX Request
//            $.ajax({
//                url: 'doBorrarComentario.php',
//                type: 'POST',
//                data: {id_comentario: deleteid},
//                success: function (response) {
//                    if (response == 1) {
//                        $(el).closest('div').fadeOut(800, function () {
//                            $(this).remove();
//                        });
//                    } else {
//                        alert('Invalid ID.');
//                    }
//
//                }
//            });
//        }
//
//    });



    cargar();
    cargarComentarios();
});


function etiquetaOrden(elem) {
    ordenarPor = $(elem).attr('por');
    enOrden = $(elem).attr('orden');
    var mensajeOrdenarPor = "";
    var mensajeEnOrden = "";
    switch (ordenarPor) {
        case "fecha_lanzamiento":
            mensajeOrdenarPor = "fecha de lanzamiento";
            break;
        case "puntuacion":
            mensajeOrdenarPor = "puntuacion";
            break;
        case "visualizaciones":
            mensajeOrdenarPor = "numero de visualizaciones";
            break;
        default:
            mensajeOrdenarPor = "fecha de lanzamiento";
    }
    switch (enOrden)
    {
        case "ASC":
            mensajeEnOrden = "ascendente";
            break;
        case "DESC":
            mensajeEnOrden = "descendente";
            break;
        default:
            mensajeEnOrden = "ascendente";
    }
    $("#mensaje-orden").html("Mostrando juegos ordenados por: " + mensajeOrdenarPor + " " + mensajeEnOrden);
    cargar();
    return $("#mensaje-orden").text();
}

function etiquetaOrdenConsola(elem) {
    var msjConsola = $(elem).attr('consola-nombre');
    $("#mensaje-consola").html("; para " + msjConsola);
}


function cargarComentarios() {

    $.ajax({
        url: "comentariosPaginados.php",
        data: {
            idJuego: idJuego,
            pag: paginaComentarios,
        },
        dataType: "html"
    }).done(function (html) {

        $('#comentarios').html(html);

        $("#comentarios-ant").click(function () {
            paginaComentarios -= 1;
            cargarComentarios();
        });

        $("#comentarios-sig").click(function () {
            paginaComentarios += 1;
            cargarComentarios();
        });
        idJuego = $("#pagina-juego").attr("idJuego");


    }).fail(function () {
        alert('Error');
    });
}