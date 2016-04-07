var content = $("#servicios_bg");
var tab_div = $("#servicios_tabs_section");
var initialHeight = content.css("height",tab_div.height()+60);
$(function() { 
    content.css("height",tab_div.height()+60);
    $('.tabs.animated-fade .tab-links-classic a').on('click', function(e)  { 
        content.css("height",tab_div.height()+60);
    });

    $("#servicios_tabs_links > li > a").bind('click',function(){
        if(this.getAttribute('href') == "#tab22"){
            content.css("height",660);
        }
        else {
            content.css("height",initialHeight);
        }
    });
});

$(window).resize(function(){
    if($("#servicios_tabs_links .active > a").attr('href') == "#tab22"){
        content.css("height",660);  
    }
    else {
        content.css("height",initialHeight);
    }
});