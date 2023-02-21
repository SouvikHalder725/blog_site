<?php
/**
 * Enqueue scripts and styles.
 */


function itng_scripts() {

	wp_enqueue_style( 'itng-fonts',  'https://fonts.googleapis.com/css?family=Lato:400,900&display=swap', array(), ITNG_VERSION );

	wp_enqueue_style( 'itng-style', get_stylesheet_uri(), array(), ITNG_VERSION);
	wp_style_add_data( 'itng-style', 'rtl', 'replace' );

	wp_enqueue_style( 'itng-main-style', esc_url(get_template_directory_uri() . '/assets/theme-styles/css/default.min.css'), array(), ITNG_VERSION);

	wp_enqueue_style( 'bootstrap', esc_url(get_template_directory_uri() . '/assets/bootstrap/bootstrap.css'), array(), ITNG_VERSION);

	wp_enqueue_style( 'owl', esc_url(get_template_directory_uri() . '/assets/owl/owl.carousel.css'), array(), ITNG_VERSION);

	wp_enqueue_style( 'mag-popup', esc_url(get_template_directory_uri() . '/assets/magnific-popup/magnific-popup.css'), array(), ITNG_VERSION);

	wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri() . '/assets/fonts/font-awesome.css'), array(), ITNG_VERSION);

	wp_enqueue_script( 'big-slide', esc_url(get_template_directory_uri() . '/assets/js/min/bigSlide.min.js'), array('jquery'), ITNG_VERSION, true );

	wp_enqueue_script( 'itng-custom-js', esc_url(get_template_directory_uri() . '/assets/js/min/custom.min.js'), array('jquery', 'big-slide', 'owl-js', 'mag-lightbox-js'), ITNG_VERSION, true );

	wp_enqueue_script( 'owl-js', esc_url(get_template_directory_uri() . '/assets/js/owl.carousel.min.js'), array('jquery'), ITNG_VERSION, true );

	wp_enqueue_script( 'mag-lightbox-js', esc_url(get_template_directory_uri() . '/assets/js/min/jquery.magnific-popup.js'), array('jquery' ), ITNG_VERSION, true );

	wp_enqueue_script( 'itng-navigation', esc_url(get_template_directory_uri() . '/assets/js/min/navigation.min.js'), array(), ITNG_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itng_scripts' );


/**
 *	Localize Customizer Data to make Theme Settings available in custom.js
 */
 function itng_localize_settings() {

	 $data = array(
		 'toTopEnable'	=>	get_theme_mod( 'itng_back_to_top', 1 ),
		 'stickyNav'	=>	get_theme_mod('itng_sticky_menu_enable', '')
	 );

	 wp_localize_script( 'itng-custom-js', 'itng', $data );

 }
 add_action('wp_enqueue_scripts', 'itng_localize_settings');
