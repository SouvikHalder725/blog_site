<?php
/**
 *	Block Styles for Block Editor
 */
 function itng_block_style() {

	 wp_enqueue_style( 'itng-block-style', esc_url( get_template_directory_uri() . '/assets/theme-styles/css/block-styles.min.css'), array(), ITNG_VERSION );

	 register_block_style(
		'core/heading',
		array(
			'name'			=>	'widget-title',
			'label'			=>	__('Widget Title', 'it-news-grid'),
            'style-handle'  =>  'itng-block-style'
		)
	);

    register_block_style(
       'core/gallery',
       array(
           'name'			=>	'client-showcase',
           'label'			=>	__('Client Showcase', 'it-news-grid'),
           'style-handle'  =>  'itng-block-style'
       )
   );

 }
 add_action( 'init', 'itng_block_style' );
