var ofertas_opened = false; 
$(function() {
    var btn_ofertas = $('#ofertas-layout');
    var styles;

    btn_ofertas.bind('click', function (e) {
        if(!ofertas_opened) {
            $(this).parents("[class]:eq(0)").removeClass("ofertas-layout-close").addClass("ofertas-layout");
            ofertas_opened = true;
        }
        else {
            $(this).parents("[class]:eq(0)").removeClass("ofertas-layout").addClass("ofertas-layout-close");
            ofertas_opened = false;
        } 
    });
});