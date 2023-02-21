<?php
/**
 * Controls for the Header Section
 */

function itng_header_customize_register( $wp_customize ) {

	$wp_customize->get_section("title_tagline")->panel	=	"itng_header";
	$wp_customize->get_section("header_image")->panel	=	"itng_header";
	//$wp_customize->get_section("widgets-sidebar-header")->panel = "itng_header";

	$wp_customize->add_panel(
		"itng_header", array(
			"title"	=>	esc_html__("Header", 'it-news-grid'),
			"priority"	=>	10
		)
	);

	$wp_customize->add_setting(
		'itng_header_height', array(
			'default'			=>	200,
			'sanitize_callback'	=>	'absint',
			'transport'			=>	'postMessage'
		)
	);

	$wp_customize->add_control(
        new itng_Range_Value_Control(
            $wp_customize, 'itng_header_height', array(
	            'label'         =>	esc_html__( 'Header Height', 'it-news-grid' ),
            	'type'          => 'itng-range-value',
            	'section'       => 'itng_header_options',
            	'settings'      => 'itng_header_height',
                'priority'		=>  8,
            	'input_attrs'   => array(
            		'min'            => 200,
            		'max'            => 650,
            		'step'           => 10,
            		'suffix'         => 'px', //optional suffix
				),
            )
        )
    );

	$wp_customize->add_setting(
		'itng_logo_width', array(
			'default'			=>	300,
			'sanitize_callback'	=>	'absint',
			'transport'			=>	'postMessage'
		)
	);

	$wp_customize->add_control(
        new itng_Range_Value_Control(
            $wp_customize, 'itng_logo_width', array(
	            'label'         =>	esc_html__( 'Logo Width', 'it-news-grid' ),
            	'type'          => 'itng-range-value',
            	'section'       => 'title_tagline',
            	'settings'      => 'itng_logo_width',
                'priority'		=>  8,
            	'input_attrs'   => array(
            		'min'            => 100,
            		'max'            => 400,
            		'step'           => 1,
            		'suffix'         => 'px', //optional suffix
				),
            )
        )
    );

	$header_control = $wp_customize->get_control( 'itng_logo_width' );

    $header_control->active_callback = function( $control ) {
        $setting = $control->manager->get_setting( 'custom_logo' );
        if (  !empty( $setting->value() ) ) {
            return true;
        } else {
            return false;
        }
    };

	$wp_customize->add_section(
		"itng_header_options", array(
			"title"		=>	esc_html__("Header Options", 'it-news-grid'),
			"panel"		=>	"itng_header",
			"priority"	=>	80
		)
	);

	$wp_customize->add_setting(
		"itng_header_style", array(
			"default"			=>	'style_1',
			"sanitize_callback"	=>	"itng_sanitize_radio"
		)
	);

	$wp_customize->add_control(
		"itng_header_style", array(
			"label"		=>	esc_html__("Header Styles", 'it-news-grid'),
			"type"		=>	"radio",
			"section"	=>	"itng_header_options",
			"priority"	=>	5,
			"choices"	=>	array(
				'style_1'	=>	esc_html__("Style 1", 'it-news-grid'),
				'style_2'	=>	esc_html__("Style 2", 'it-news-grid'),
			)
		)
	);

	$wp_customize->add_setting(
		'itng_header_overlay_opacity', array(
			'default'	=>	30,
			'sanitize_callback'	=>	'absint',
			'transport'			=>	'postMessage'
		)
	);

	$wp_customize->add_control(
		new itng_Range_Value_Control(
			$wp_customize,
			'itng_header_overlay_opacity', array(
				'label'		=>	__('Overlay Opacity', 'it-news-grid'),
				'type'		=>	'itng-range-value',
				'section'	=>	'itng_header_options',
				'settings'	=>	'itng_header_overlay_opacity',
				'priority'	=>	35,
				'input_attrs'	=>	array(
							'min'	=>	1,
							'max'	=>	100,
							'step'	=>	1,
							'suffix'=>	'%'
				)
			)
		)
	);

	$wp_customize->add_setting(
		'itng_sticky_menu_enable', array(
			'default'	=>	'',
			'sanitize_callback'	=> 'itng_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'itng_sticky_menu_enable', array(
			'label'		=>	__('Enable Sticky Navigation', 'it-news-grid'),
			'type'		=>	'checkbox',
			'section'	=>	'itng_header_options',
			'priority'	=>	40
		)
	);

	$wp_customize->add_setting(
		'itng_header_ad_widget', array(
			'default'	=>	'',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		new itng_Custom_Button_Control (
			$wp_customize, 'itng_header_ad_widget', array(
				'label'		=>	__('Edit Ad Wudget', 'it-news-grid'),
				'type'		=>	'itng-link',
				'section'	=>	'itng_header_options',
				'settings'	=>	'itng_header_ad_widget',
				'priority'	=>	50,
			)
		)
	);

	$header_control = $wp_customize->get_control( 'itng_header_ad_widget' );

    $header_control->active_callback = function( $control ) {
        $setting = $control->manager->get_setting( 'itng_header_style' );
        if (  $setting->value() == 'style_2' ) {
            return true;
        } else {
            return false;
        }
    };

	$header_controls = array_filter( array(
        $wp_customize->get_control( 'itng_header_ad_widget' ),
        $wp_customize->get_control( 'itng_header_height' ),
        $wp_customize->get_control( 'itng_header_overlay_opacity' )
    ) );
    foreach ( $header_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itng_header_style' );

            if (  $setting->value() === 'style_1' ) {
                if ( $control->id == "itng_header_height" ||
                     $control->id == "itng_header_overlay_opacity"
				) {
                         return true;
                     } else {
                         return false;
                 }
             }

             if (  $setting->value() === 'style_2' ) {
                 if ( $control->id == "itng_header_ad_widget" ) {
                          return true;
                  } else {
                      return false;
                  }
              }
        };
    }

	$wp_customize->add_setting(
	    'itng_back_to_top', array(
		    'default'	=>	1,
		    'sanitize_callback'	=>	'itng_sanitize_checkbox'
	    )
    );

    $wp_customize->add_control(
	    'itng_back_to_top', array(
		    'label'		=>	__('Enable Back to Top Button', 'it-news-grid'),
		    'type'		=>	'checkbox',
		    'priority'	=>	15,
		    'section'	=>	'itng_general_options'
	    )
    );
}

add_action("customize_register", "itng_header_customize_register");
