/**
 *	jQuery for Customizer Controls
 */

(function() {

	wp.customize.bind('ready', function() {

		var headerAd = wp.customize.control('itng_header_ad_widget').container.find("button")
		headerAd.on('click', () => {
			wp.customize.section('sidebar-widgets-sidebar-header').expand()
		})

	})


	var sidebarControls = ['blog', 'single', 'search', 'archive'];

    jQuery.each( sidebarControls, function( index, value ) {
        wp.customize('itng_' + value + '_sidebar_enable', function( setting ) {
	        var setupControl = function( control ) {

	            var setActiveState = function() {
	                control.active.set( setting.get() );
	            };
	            setActiveState();
	            setting.bind( setActiveState );
            };
            wp.customize.control( 'itng_' + value + '_sidebar_layout', setupControl );
            //wp.customize.control( 'diviner_blog_sidebar_align', setupControl );
        });
    });

	wp.customize('itng_header_style', function( setting ) {

	    var setupControl = function( control ) {

            var isStyle2 = function() {
                if ( control.id === 'itng_header_ad_widget' ) {
                    return true
                } else {
                    return false
                }
             }

             var isStyle1 = function() {
                 if ( control.id == 'itng_header_height' ||
                      control.id == 'itng_header_overlay_opacity' ) {
                     return true
                 } else {
                     return false
                 }
             }

            var setActiveState = function() {

                    if ( setting.get() === 'style_1' ) {
                        control.active.set( isStyle1() );
                    }

                    if ( setting.get() === 'style_2' ) {
                        control.active.set( isStyle2() );
                    }
            };
            setActiveState();
            setting.bind( setActiveState );

        };

        wp.customize.control( 'itng_header_ad_widget', setupControl );
        wp.customize.control( 'itng_header_height', setupControl );
        wp.customize.control( 'itng_header_overlay_opacity', setupControl );
    })

	wp.customize('custom_logo', function( setting ) {

	    var setupControl = function( control ) {

            var checkLogo = function() {
                return setting.get() == "" ? false : true;
            }

            var setActiveState = function() {
                control.active.set( checkLogo() );
            };
            setActiveState();
            setting.bind( setActiveState );
        };
        wp.customize.control(  'itng_logo_width', setupControl );
    })

	// Slider Control
	wp.customize.bind('ready', function() {
        rangeSlider();
    });

    var rangeSlider = function() {
        var slider = jQuery('.range-slider'),
            range = jQuery('.range-slider__range'),
            value = jQuery('.range-slider__value');

        slider.each(function() {

            value.each(function() {
                var value = jQuery(this).prev().attr('value');
				var suffix = (jQuery(this).prev().attr('suffix')) ? jQuery(this).prev().attr('suffix') : '';
                jQuery(this).html(value + suffix);
            });

            range.on('input', function() {
				var suffix = (jQuery(this).attr('suffix')) ? jQuery(this).attr('suffix') : '';
                jQuery(this).next(value).html(this.value + suffix );
            });
        });
    };
})( jQuery );

wp.customize.sectionConstructor['itng-button'] = wp.customize.Section.extend( {

	// No events for this type of section.
	attachEvents: () => {},

	// Always make the section active.
	isContextuallyActive: () => {
		return true;
	}
} );
