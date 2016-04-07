$("#frame-cortina > .btn").bind("click",function(){
    // hacemos una animacion para el fondo y las letras
    setTimeout(function() {
        $("#frame-cortina").animate({"background":"transparent"},"slow");
        $("#frame-cortina").css("height","0");
        $("#frame-cortina").css("z-index","0");
        $("#frame-cortina > h1").css("opacity","0");
        $("#frame-cortina > p").css("top","-220px");
    }, 100);

    // creamos un nuevo elemento dentro del nodo #tool-button con un retardo de 1.3s para que le de
    // tiempo a la animacion de fadeout del frame a terminar
    setTimeout(function() {
        $("#frame-cortina").css("display","none");
        $('#mapa-urbandream-granada').removeClass('scrolloff');                    
    }, 1300);

    // animacion para que aparezca el nuevo boton de desactivar mapa
    setTimeout(function() {
        $("#tool-button").css("display","block");
        $("#tool-button > p").animate({"opacity":"1"},"linear");
    }, 800);
});   

$("#tool-button > .btn").bind("click",function(){
    // animacion para esconder el boton de desactivar mapa
    setTimeout(function() {                    
        $("#tool-button > p").animate({"opacity":"0"},"linear");                    
    }, 100);

    setTimeout(function(){
        $("#tool-button").css("display","none");
        $("#frame-cortina").css("display","block");
    }, 800);

    // animacion para que vuelva el frame de ubicacion y activar mapa
    setTimeout(function() {
        $("#frame-cortina").animate({
            "background":"linear-gradient(rgba(0, 0, 0, 0.85),rgba(90, 0, 230, 0.15));"
        },"slow");
        $("#frame-cortina").css("height","500");
        $("#frame-cortina").css("z-index","1900");
        $("#frame-cortina > h1").animate({"opacity":"1"},"linear");
        $("#frame-cortina > p").css("top","30px");
    }, 800);
});  