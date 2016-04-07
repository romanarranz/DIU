var open_phone = false;
$("#phone_number").bind('click', function(){
    if(!open_phone){
        // Abrir el desplegable
        $(".phone.close").removeClass("close").addClass("open");
        open_phone = true;

        // Cambiar la orientacion de la flecha hacia arriba
        $("#phone_number > i").removeClass("fa-angle-down").addClass("fa-angle-up");
    }
    else {
        // Cerrar el desplegable
        $(".phone.open").removeClass("open").addClass("close");
        open_phone = false;

        // Cambiar la orientacion de la flecha hacia abajo
        $("#phone_number > i").removeClass("fa-angle-up").addClass("fa-angle-down");
    }
});
