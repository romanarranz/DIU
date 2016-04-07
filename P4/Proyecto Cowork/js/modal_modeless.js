var modal_open = false,
    pick = null,
    closeBttn = document.querySelector('.overlay-close'),
    modal = document.getElementsByClassName('overlay');
console.log(closeBttn);
function parentNodeByTag(child, parent, trys, depth){
    if(trys == depth)
        return null;
    else if(child.parentNode.nodeName == parent){
        //console.log("He encontrado al padre "+parent+" del nodo hijo y es : "+child.parentNode+" "+child.parentNode.className);
        pick = child.parentNode;
    }
    else {
        //console.log("Es un nodo cualquiera y su padre es : "+child.parentNode+" "+child.parentNode.className);
        parentNodeByTag(child.parentNode, parent, trys+1, depth);
    }
}

// capturar los clics en todo el documento para hacer la funcion modeless
document.addEventListener('click', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement;  // recuperamos el objeto en el que se ha hecho el clic
        //text   = target.textContent || text.innerText;    // recuperar el texto del nodo

    // cuando se haga clic en el #trigger-overlay se habra abierto el modal
    if(target.id == "trigger-overlay"){
        modal_open = true;
    }
    // a hecho clic en un sitio que no es ni el modal ni el boton de cerrar el modal
    else if(target != closeBttn && target.className != modal[0].className){

        // nodos hijos modal: buscar padre section mas cercano del elemento al que se ha hecho clic y vemos si es el modal
        parentNodeByTag(target, 'SECTION', 0, 4);        
            
        substring = "overlay";
        
        // -1 estamos fuera del modal, > 1 se habria encontrado el substring y estariamos dentro del modal
        if(modal_open && pick.className.indexOf(substring) == -1){
            closeBttn.click();
            modal_open = false;
        }
    }
    // fix de un error que hacia que se abriera el modal cuando se pinchaba fuera de el cuando se encontraba oculto
    else if(target.className == "overlay-close")
        modal_open = false;

    //console.log("Clic en "+target.className+" su padre es "+pick.className+" , modal "+modal_open);

}, false);