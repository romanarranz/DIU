var styles, styles2, open_motor = false;
$(function() {
    $(".reservas-titulo").bind('click',function(){                
        if(!open_motor){
            if ( $('body').width() >= 320 && $('body').width() < 640) { // mobile-mini, mobile, tablet-mini resolution
                styles = {
                    "height":"370px"
                };
                styles2 = {
                    "display":"block",
                    "-webkit-opacity":"1",
                    "-moz-opacity":"1",
                    "opacity":"1"
                };
                open_motor = true;
            }
            else if ($('body').width() >= 530 && $('body').width() < 950) { // tablet resolution
                styles = {
                    "height":"370px"
                };
                styles2 = {
                    "display":"block",
                    "-webkit-opacity":"1",
                    "-moz-opacity":"1",
                    "opacity":"1"
                };
                open_motor = true;   
            }
        }
        else {
            if ( $('body').width() >= 320 && $('body').width() < 640) { // mobile-mini, mobile, tablet-mini resolution
                styles = {
                    "height":"0px"
                };
                styles2 = {
                    "display":"none",
                    "-webkit-opacity":"0",
                    "-moz-opacity":"0",
                    "opacity":"0"
                };
                open_motor = false;   
            }
            else if ($('body').width() >= 530 && $('body').width() < 950) { // tablet resolution
                styles = {
                    "height":"0px"
                };
                styles2 = {
                    "display":"none",
                    "-webkit-opacity":"0",
                    "-moz-opacity":"0",
                    "opacity":"0"
                };
                open_motor = false;   
            }
        }
        $("#motor").css(styles);
        $("#mirai_bookentrance").css(styles2);
    });
});

$(window).resize(function(){  
    if(!open_motor){
        if ( $('body').width() >= 950) { // desktop, desktop-xl resolution
            styles = {
                "height":"370px"
            };
            styles2 = {
                "display":"block",
                "-webkit-opacity":"1",
                "-moz-opacity":"1",
                "opacity":"1"
            };
            open_motor = true;
        }
        else {
            styles = {
                "height":"0px"
            };
            styles2 = {
                "display":"none",
                "-webkit-opacity":"0",
                "-moz-opacity":"0",
                "opacity":"0"
            };
            open_motor = false; 
        }
    }
    else {
        if ( $('body').width() >= 950) { // desktop, desktop-xl resolution
            styles = {
                "height":"370px"
            };
            styles2 = {
                "display":"block",
                "-webkit-opacity":"1",
                "-moz-opacity":"1",
                "opacity":"1"
            };
            open_motor = true;
        }
        else {
            styles = {
                "height":"0px"
            };
            styles2 = {
                "display":"none",
                "-webkit-opacity":"0",
                "-moz-opacity":"0",
                "opacity":"0"
            };
            open_motor = false; 
        }
    }
    $("#motor").css(styles);
    $("#mirai_bookentrance").css(styles2);
});