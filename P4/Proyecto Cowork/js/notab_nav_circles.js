// JS for slideshow
var slideWidth = $(".slideshow section.holder section.slide:first").width();
console.log(slideWidth);
var timing = 600;
var position = 0;
function changePosition(id_circulo){
    position = $(".dotstyle.dotstyle-fillup > li:eq("+id_circulo+") > a").attr('href').split('-').pop();
    $('.slider').animate({ scrollLeft: position * slideWidth }, timing);
}

// JS for dotstyle-circles

// obtenemos el numero total de circulos que tenemos para paginar imagenes
var n_circulos = $(".dotstyle.dotstyle-fillup").children().length;            
var id_circulo = 0;
var position;
[].slice.call( document.querySelectorAll( '.dotstyle' ) ).forEach( function( nav ) {
    new DotNav( 
        nav,
        'li > a',
        {
            callback : function( idx ) {
            // obtenemos el indice del circulo actual de la imagen que se esta mostrando
            // console.log( idx );
            id_circulo = idx;
            changePosition(id_circulo);                        
            }
        });
});

// navegacion con flechas
$('.arrow.nav-circlepop > a').click(function() {                    

    if($(this).hasClass("next"))
        id_circulo = (id_circulo + 1)%n_circulos;
    else 
        // sumamos n_circulos porque las operaciones modulo negativo javascript no las hace bien
        id_circulo = (id_circulo + n_circulos - 1)%n_circulos;                     
    
    $(".dotstyle.dotstyle-fillup > li:eq("+id_circulo+") > a")[0].click();
});