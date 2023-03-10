<?php

/**
 * Section with Button
 */

if ( class_exists( 'WP_Customize_Section' ) ) {

	class Button extends WP_Customize_Section {

		/**
		 * The type of customize section being rendered.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $type = 'itng-button';

		/**
		 * Custom button text to output.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $button_text = '';

		/**
		 * Custom button URL to output.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $button_url = '';

		/**
		 * Default priority of the section.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $priority = 999;

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return array
		 */
		public function json() {

			$json       = parent::json();
			$theme      = wp_get_theme();
			$button_url = $this->button_url;

			// Fall back to the `Theme URI` defined in `style.css`.
			if ( ! $button_url && $theme->get( 'ThemeURI' ) ) {

				$button_url = $theme->get( 'ThemeURI' );

			// Fall back to the `Author URI` defined in `style.css`.
			} elseif ( ! $button_url && $theme->get( 'AuthorURI' ) ) {

				$button_url = $theme->get( 'AuthorURI' );
			}

			$json['button_text'] = $this->button_text ? $this->button_text : $theme->get( 'Name' );
			$json['button_url']  = esc_url( $button_url );

			return $json;
		}

		/**
		 * Outputs the Underscore.js template.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.button_text && data.button_url ) { #>
						<a href="{{ data.button_url }}" class="button button-primary alignright" target="_blank" rel="external nofollow noopener noreferrer">{{ data.button_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}


add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Button::class );

	$manager->add_section(
		new Button( $manager, 'itng-plus', array(
			'title'       => __( 'Want more Features?', 'it-news-grid' ),
			'priority'		=> 1,
			'button_text' => __( 'Get Pro Version', 'it-news-grid' ),
			'button_url'  => 'https://indithemes.com/product/it-news-grid-plus/'
		) )
	);

} );
