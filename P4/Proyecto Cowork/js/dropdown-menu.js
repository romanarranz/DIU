$(document).ready(function () {
    var open = false;
    //$('.dropdown .drop .trigger-sub i').on('click', function () {
    $("#hotel-dropdown").bind('click', function () {
        if(!open) {
            $("#hotel-dropdown i").removeClass('fa-angle-down').addClass('fa-angle-up');
            open = true;
        }
        else {
            $("#hotel-dropdown i").removeClass('fa-angle-up').addClass('fa-angle-down');
            open = false;
        }
        //$(this).parent().toggleClass('active');
        $('.drop-sub').slideToggle(150);
        var styles = {
            "display" : "block"
        };
        $(".drop-sub").css( styles );
        return false;
    });

    $("#tablet-dropdown").bind('click', function () {
        if(!open) {
            $("#tablet-dropdown i").removeClass('fa-angle-down').addClass('fa-angle-up');
            open = true;
        }
        else {
            $("#tablet-dropdown i").removeClass('fa-angle-up').addClass('fa-angle-down');
            open = false;
        }
        //$(this).parent().toggleClass('active');
        $('.dropdown').slideToggle(150);
        var styles = {
            "display" : "block"
        };
        $(".dropdown").css( styles );
        return false;
    });
});