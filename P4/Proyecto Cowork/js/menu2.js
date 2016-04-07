var nav_opened = false; 
$(function() {
    var btn_movil = $('.nav-mobile');
    var styles;

    //console.log(btn_movil);
    btn_movil.bind('click', function (e) {
        e.preventDefault();

        var el = $('.tablet-nav');
        if(!nav_opened){    // menu abierto
            el.addClass("open-menu");
            nav_opened = true;
        }
        else {  // menu cerrado
            el.removeClass("open-menu");
            nav_opened = false;
        } 
    });

});

/*$(window).resize(function(){ 
    var styles;

    if ( $('body').width() >= 350 && $('body').width() < 950) { // mobile, tablet-mini resolution
        styles = {
            "width" : "0",
            "-webkit-transition": "all 0.3s ease",
            "-moz-transition": "all 0.3s ease",
            "-ms-transition": "all 0.3s ease", 
            "-o-transition": "all 0.3s ease"
        };
    }
    $(".tablet-nav").css(styles);
});*/