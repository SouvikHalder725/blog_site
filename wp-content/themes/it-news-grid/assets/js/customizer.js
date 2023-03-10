/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

    wp.customize( 'itng_logo_width', function( value ) {
        value.bind( function ( logoWidth ) {
            $('.custom-logo-link img' ).css( 'width', logoWidth + 'px' )
        } )
    } )

    wp.customize( 'itng_header_height', function( value ) {
        value.bind( function ( headerHeight ) {
            $('#header-image' ).css( 'height', headerHeight + 'px' )
        } )
    } )

    wp.customize( 'itng_header_overlay_opacity', function( value ) {
        value.bind( function ( overlayOpacity ) {
            $('#header-image .header-overlay' ).css( 'opacity', overlayOpacity / 100   )
        } )
    } )

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description,#header_content_wrapper, #masthead #top-bar button' ).css( {
					color: to,
				} );
			}
		} );
	} );
}( jQuery ) );
