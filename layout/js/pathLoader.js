/**
 * pathLoader.js v1.0.0
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

	function PathLoader( el ) {
		this.el = el;
		// clear stroke
		this.el.style.strokeDasharray = this.el.style.strokeDashoffset = this.el.getTotalLength();
	}

	PathLoader.prototype._draw = function( val ) {
		this.el.style.strokeDashoffset = this.el.getTotalLength() * ( 1 - val );
	}

	PathLoader.prototype.setProgress = function( val, callback ) {
		this._draw(val);
		if( callback && typeof callback === 'function' ) {
			// give it a time (ideally the same like the transition time) so that the last progress increment animation is still visible.
			setTimeout( callback, 200 );
		}
	}

	PathLoader.prototype.setProgressFn = function( fn ) {
		if( typeof fn === 'function' ) { fn( this ); }
	}

	// add to global namespace
	window.PathLoader = PathLoader;

})( window );

window.loader = new PathLoader(jQuery('#ip-loader-circle')[0]);
window.loaderProgress = 0.9;

jQuery(document).ready(function() {

	function initLoader() {
        var progress = 0;
        LoaderInterval = setInterval( function() {
            progress = Math.min( progress + Math.random() * 0.1, loaderProgress );
            loader.setProgress( progress );

            if( progress === 1 ) {
                jQuery('#awesome-loader').addClass('loaded');
                jQuery('#awesome-loader').removeClass('loading');
                clearInterval( LoaderInterval );
            }
        },80);
    };

    setTimeout(function(){ initLoader(); }, 900);

});

jQuery(window).load(function() {
    loaderProgress = 1;
});