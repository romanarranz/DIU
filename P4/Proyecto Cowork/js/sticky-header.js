// JS for scroll fixed-menu depends of waypoints.min.js
var $head = $( '#nav' );
$( '.ha-waypoint' ).each( function(i) { // por cada clase .ha-waypoint que me ecuentro
    var $el = $( this ),
        animClassDown = $el.data( 'animateDown' ),  // me quedo con el data-animate-down
        animClassUp = $el.data( 'animateUp' );      // me quedo con el data-animate-up

    $el.waypoint( function( direction ) {
        if( direction === 'down' && animClassDown ) {   // si baja la pagina al disparador
            $head.attr('class', animClassDown);         // actualizo la clase del menu con la nueva que quiera
        }
        else if( direction === 'up' && animClassUp ){   // si sube la pagina al disparador
            $head.attr('class', animClassUp);           // actualizo la clase del menu con la nueva que quiera
        }
    }, { offset: '100%' } );
} );