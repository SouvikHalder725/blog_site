<?php
/**
 *  File for Custom CSS
 */

function itng_custom_css() {

    $primary_width     = 100 - get_theme_mod('itng_sidebar_width', '25') . '%';
    $secondary_width   = get_theme_mod('itng_sidebar_width', '25') . '%';
    $ho_alpha = get_theme_mod('itng_header_overlay_opacity', 30) / 100;
    $logo_width = get_theme_mod('itng_logo_width', 300);
    $header_height = get_theme_mod('itng_header_height', 200);

    $css = "";

    $css .= ".custom-logo-link img {width: " . esc_html($logo_width) . "px;}";

    if ( isset( $header_height ) && $header_height !== 200 ) {
        $css .= "#header-image {height: " . esc_html( $header_height ) . "px;}";
    }

    $css .= "@media screen and (min-width: 992px) {";

        if (is_home() && is_active_sidebar('sidebar-1') && get_theme_mod('itng_blog_sidebar_enable', 1) !== '' ) {
            $css .= 'body.blog #primary  {width: ' . $primary_width . ';}';
            $css .= 'body.blog #secondary {width: ' . $secondary_width . ';}';
        }

        if (is_single() && is_active_sidebar('sidebar-single') && get_theme_mod('itng_single_sidebar_enable', 1) !== '' ) {
            $css .= 'body.single-post #primary {width: ' . $primary_width . ';}';
            $css .= 'body.single-post #secondary {width: ' . $secondary_width . ';}';
        }

        if (is_search() && is_active_sidebar('sidebar-1') && get_theme_mod('itng_search_sidebar_enable', 1) !== '' ) {
            $css .= 'body.search #primary {width: ' . $primary_width . ';}';
            $css .= 'body.search #secondary {width: ' . $secondary_width . ';}';
        }

        if (is_archive() && is_active_sidebar('sidebar-1') && get_theme_mod('itng_archive_sidebar_enable', 1) !== '' ) {
            $css .= 'body.archive #primary {width: ' . $primary_width . ';}';
            $css .= 'body.archive #secondary {width: ' . $secondary_width . ';}';
        }

        if (!is_front_page() && is_page() && is_active_sidebar('sidebar-page') && get_post_meta(get_the_ID(), 'enable-sidebar', true) !== '' ) {
            $css .= 'body.page-template-default #primary {width: ' . $primary_width . ';}';
            $css .= 'body.page-template-default #secondary {width: ' . $secondary_width . ';}';
        }

        $css .= '#header-image .header-overlay {
            opacity: ' . $ho_alpha . ';
        }';

	$css .= "}";

	if ( is_user_logged_in() ) {
	    $css .= '#panel-top-bar {margin-top: 46px}';
    }

     wp_add_inline_style( 'itng-main-style', wp_strip_all_tags( $css ) );

 }
 add_action('wp_enqueue_scripts', 'itng_custom_css');
