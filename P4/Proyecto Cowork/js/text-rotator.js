$(document).ready(function(){
    setupRotator();
});

function setupRotator()
{
    if($('.textItem').length > 1)
    {
        $('.textItem:first').addClass('current').fadeIn(1000);
        setInterval('textRotate()', 5000);
    }
}

function textRotate()
{
    var current = $('#text-rotator > ul > .current');
    if(current.next().length == 0)
    {
        current.removeClass('current').fadeOut(2000);
        $('.textItem:first').addClass('current').fadeIn(2000);
    }
    else
    {
        current.removeClass('current').fadeOut(2000);
        current.next().addClass('current').fadeIn(2000);
    }
}