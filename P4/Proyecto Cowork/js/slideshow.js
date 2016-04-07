var i = 0;
function slideSwitch(id) { 
    var active = $(id+' > figure img.active');
    //console.log(active);

    // si ninguna imagen tiene marcada la class active ponemos por defecto la ultima como activa
    if ( active.length == 0 )
        active = $(id+' > figure img:last');

    // selecciono todos los figure dentro del id #main-slideshow
    var next = active.parent().next().children();
    //console.log(next);
    if(next.length > 0)
        next = active.parent().next().children();
    else 
        next = $(id+' > figure img:first');

    active.addClass('last-active');

    next.css({opacity: 0.0}).addClass('active').animate({opacity: 1.0}, 1000, function() {
        active.removeClass('active last-active');
    });
}

$(function() {
    // llamamos cada 5 segundos a la funcion para visualizar la siguiente imagen    
    setInterval( "slideSwitch('#main-slideshow')", 5000);
});