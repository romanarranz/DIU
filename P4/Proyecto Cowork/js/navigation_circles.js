/**
 * menu.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;( function( window ) {

    'use strict';

    function extend( a, b ) {
        for( var key in b ) { 
            if( b.hasOwnProperty( key ) ) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function DotNav( el, selector, options ) {
        this.nav = el;
        this.options = extend( {}, this.options );
        extend( this.options, options );
        this._init(selector);
    }

    DotNav.prototype.options = {};

    DotNav.prototype._init = function(selector) {
        // special case "dotstyle-hop"
        var hop = this.nav.parentNode.className.indexOf( 'dotstyle-hop' ) !== -1;

        var dots = [].slice.call( this.nav.querySelectorAll( selector ) ), current = 0, self = this;

        dots.forEach( function( dot, idx ) {
            dot.addEventListener( 'click', function( ev ) {
                ev.preventDefault();
                if( idx !== current ) {
                    // actualizo el className de los li nodos padres de cada enlace a 
                    //  <li class=""><a/></li>
                    //  <li class=""><a/></li>
                    //  ....
                    dots[ current ].parentNode.className = '';
                    
                    setTimeout( function() {
                        // actualizo el className del li nodo padre del link pulsado <li class=" current"><a/></li>
                        dot.parentNode.className += ' current';
                        current = idx;  // actualizamos el indice
                        
                        if( typeof self.options.callback === 'function' ) {
                            self.options.callback( current );
                        }
                    }, 25 );      
                }
            } );
        } );
    }

    // add to global namespace
    window.DotNav = DotNav;

})( window );