var nav_opened = false; 
$(function() {
    var btn_movil = $('.nav-mobile');
    var styles;

    console.log(btn_movil);
    btn_movil.bind('click', function (e) {
        e.preventDefault();

        var el = $('.main-nav');
        if(!nav_opened){    // menu abierto
            el.addClass("open-menu");
            nav_opened = true;

            // -- FIX v1.0.1 --
            // se ha añadido esto porque sino la imagen de urbandream se quedaba un poco descolocada
            // posicionar correctamente la imagen dentro del hexagono de la pagina principal del div del mapa
            styles = {
                "left" : "-20px",
                "position": "relative",
                "-webkit-transition": "all 0.2s linear",
                "-moz-transition": "all 0.2s linear",
                "-ms-transition": "all 0.2s linear", 
                "-o-transition": "all 0.2s linear"
            };
            $("#clipSection img").css( styles );

            // -- FIX v1.0.3 --
            // si el tamaño del body es menor que 529 estamos en resolucion movil y por lo tanto hay que redimensionar
            // con las mismas dimensones que definimos en la hoja de less
            if ($('body').width() < 529 ){ 
                styles = {
                    "width" : "60%",
                    "-webkit-transition": "all 0.2s linear",
                    "-moz-transition": "all 0.2s linear",
                    "-ms-transition": "all 0.2s linear", 
                    "-o-transition": "all 0.2s linear"
                };
            }
            else {
                styles = {
                    "width" : "80%",
                    "-webkit-transition": "all 0.2s linear",
                    "-moz-transition": "all 0.2s linear",
                    "-ms-transition": "all 0.2s linear", 
                    "-o-transition": "all 0.2s linear"
                };   
            }
            $("#logo_principal").css( styles );


            // -- FIX v1.0.4 --
            if ( $('body').width() >= 0 && $('body').width() < 640) { // tablet-mini resolution
                styles = {
                    "left" : "40%",
                    "-webkit-transition": "all 0.3s ease",
                    "-moz-transition": "all 0.3s ease",
                    "-ms-transition": "all 0.3s ease", 
                    "-o-transition": "all 0.3s ease"
                };
            }
            else if ($('body').width() >= 530 && $('body').width() < 950) { // tablet resolution
                styles = {
                    "left" : "30%",
                    "-webkit-transition": "all 0.3s ease",
                    "-moz-transition": "all 0.3s ease",
                    "-ms-transition": "all 0.3s ease", 
                    "-o-transition": "all 0.3s ease"
                };
            }
            else { // desktop, desktop-xl resolution
                styles = {
                    "left" : "20%",
                    "-webkit-transition": "all 0.3s ease",
                    "-moz-transition": "all 0.3s ease",
                    "-ms-transition": "all 0.3s ease", 
                    "-o-transition": "all 0.3s ease"
                };
            }
            $(".social").css( styles );
        }
        else {  // menu cerrado
            el.removeClass("open-menu");
            nav_opened = false;

            // -- FIX v1.0.1 --
            // reestablecer estilos de la imagen dentro del hexagono de la pagina principal del div del mapa
            styles = {
                "left" : "",
                "position": "inherit",
                "-webkit-transition": "all 0.2s linear",
                "-moz-transition": "all 0.2s linear",
                "-ms-transition": "all 0.2s linear", 
                "-o-transition": "all 0.2s linear"
            };
            $("#clipSection img").css( styles );

            // -- FIX v1.0.3 --
            // reestablecer estilos de la imagen del logo de urbandream para ajustarla al centro del div de index.html
            styles = {
                "width" : "100%",
                "-webkit-transition": "all 0.2s linear",
                "-moz-transition": "all 0.2s linear",
                "-ms-transition": "all 0.2s linear", 
                "-o-transition": "all 0.2s linear"
            };   
            $("#logo_principal").css( styles );


            // -- FIX v1.0.4 --
            styles = {
                "left" : "0",
                "-webkit-transition": "all 0.3s ease",
                "-moz-transition": "all 0.3s ease",
                "-ms-transition": "all 0.3s ease", 
                "-o-transition": "all 0.3s ease"
            };
            $(".social").css( styles );
        } 
    });

});

// -- FIX v1.0.4 --
$(window).resize(function(){  
    var styles;
    if(nav_opened){         
        if ( $('body').width() >= 350 && $('body').width() < 640) { // mobile, tablet-mini resolution
            styles = {
                "left" : "40%",
                "-webkit-transition": "all 0.3s ease",
                "-moz-transition": "all 0.3s ease",
                "-ms-transition": "all 0.3s ease", 
                "-o-transition": "all 0.3s ease"
            };
        }
        else if ($('body').width() >= 530 && $('body').width() < 950) { // tablet resolution
            styles = {
                "left" : "30%",
                "-webkit-transition": "all 0.3s ease",
                "-moz-transition": "all 0.3s ease",
                "-ms-transition": "all 0.3s ease", 
                "-o-transition": "all 0.3s ease"
            };
        }
        else { // desktop, desktop-xl resolution
            styles = {
                "left" : "20%",
                "-webkit-transition": "all 0.3s ease",
                "-moz-transition": "all 0.3s ease",
                "-ms-transition": "all 0.3s ease", 
                "-o-transition": "all 0.3s ease"
            };
        }
        $(".social").css( styles );
    }
    else {
        styles = {
            "left" : "0",
            "-webkit-transition": "all 0.3s ease",
            "-moz-transition": "all 0.3s ease",
            "-ms-transition": "all 0.3s ease", 
            "-o-transition": "all 0.3s ease"
        };
        $(".social").css( styles );
    }
});
