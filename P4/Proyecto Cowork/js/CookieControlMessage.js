$(document).ready(function () {
    if('localStorage' in window && window['localStorage'] !== null && localStorage.controlcookie == undefined) 
    {
		$('#sta-cookies').prop('checked', false);
    }
    else // guardamos cookie normal
    {
        var cookie = NotExistsControlCookie();
        if (cookie !== "")
        {
            var cookieInfo = jQuery.parseJSON(cookie);
        }
    }
});

function controlcookies() {
    
    if ('localStorage' in window && window['localStorage'] !== null)
    {
        // Si la variable no existe se crea
        localStorage.controlcookie = (localStorage.controlcookie || 0);
        if (localStorage.controlcookie < 1)
            localStorage.controlcookie++; // incrementamos cuenta de la cookie
    }
    else
    {
        var cookie = NotExistsControlCookie();
        if (cookie == "")
        {// Creamos cookie normal
            var fecha = new Date();
            var tiempoCookie = fecha.getTime()+(30*24*60*60*1000); // caducidad 30 dias
            fecha.setTime(tiempoCookie);
            document.cookie = "CookieControlMessage=1; expires=" + fecha.toGMTString() + "; path=/";
        }
    }
}

// Retorna un array amb totes les cookies
function NotExistsControlCookie() {
    
    // Inicialitzem array dinfo de cookies
    var cookieInfoArray = new Array();
    var ControlCookie = "";
    if (document.cookie !== undefined)
    {
        // Busquem totes les cookies del navegador per trobar la d'acceptacio de politica
        var lineas = document.cookie.split(";");
        if (lineas !== undefined)
        {
            // Per cada cookie
            $.each(lineas, function(key, value) {
                var cookieInfo = value.split("=");
                var name = cookieInfo[0];
                var cookieValue = decodeURIComponent(cookieInfo[1]).replace("'", "\\'");
                if (name !== undefined)
                {
                    // Si es una cookie dhistoric dhotels, la tractem
                    if (name.indexOf('CookieControlMessage') !== -1)
                    {
                        ControlCookie = cookieValue;
                        return false;
                    }
                }
            });   
        }
    }
    return ControlCookie;
}