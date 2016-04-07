$(document).ready(function () {

    // you want to enable the pointer events only on click;

    $('#mapa-urbandream-granada').addClass('scrolloff'); // set the pointer events to none on doc ready
    $('#mapa-urbandream-granada').on('click', function () {
        $('#mapa-urbandream-granada').removeClass('scrolloff'); // set the pointer events true on click
    });

    // you want to disable pointer events when the mouse leave the canvas area;

    $("#mapa-urbandream-granada").mouseleave(function () {
        $('#mapa-urbandream-granada').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
    });
});