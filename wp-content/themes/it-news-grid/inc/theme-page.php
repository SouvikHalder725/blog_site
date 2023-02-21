<?php
/**
 *  Theme Page
 */

function itng_admin_theme_page() {
    add_theme_page('IT News Grid', 'IT News Grid', 'edit_theme_options', 'itng_options', 'itng_theme_info');
}
add_action('admin_menu', 'itng_admin_theme_page');

function itng_theme_info() {
    ?>
    <div id="itng-admin-theme-info">
        <h1>
            <?=__('Theme Info', 'it-news-grid'); ?>
        </h1>
        <h2>
            <?=__('Check Out IT News Grid Theme Demos', 'it-news-grid'); ?>
        </h2>
        <div class="itng-theme-demos">

            <figure class="demo-1">
                <a href="http://demo.indithemes.com/itnewsgrid" target="_blank" rel="external">
                    <img src="<?=esc_url( get_template_directory_uri() . '/assets/images/demos/1.jpeg'); ?>" alt="<?=__('IT News Grid Demo', 'it-news-grid') ?>">
                </a>
                <figcaption>
                    <?=__('Default', 'it-news-grid'); ?>
                </figcaption>
            </figure>

            <figure class="demo-2">
                <a href="http://demo.indithemes.com/it-news-grid-2" target="_blank" rel="external">
                    <img src="<?=esc_url( get_template_directory_uri() . '/assets/images/demos/2.jpeg'); ?>" alt="<?=__('IT News Grid Demo', 'it-news-grid') ?>">
                </a>
                <figcaption>
                    <?=__('Travel', 'it-news-grid'); ?>
                </figcaption>
            </figure>

            <figure class="demo-3">
                <a href="http://demo.indithemes.com/it-news-grid-3" target="_blank" rel="external">
                    <img src="<?=esc_url( get_template_directory_uri() . '/assets/images/demos/3.jpeg'); ?>" alt="<?=__('IT News Grid Demo', 'it-news-grid') ?>">
                </a>
                <figcaption>
                    <?=__('Feminism', 'it-news-grid'); ?>
                </figcaption>
            </figure>

            <figure class="demo-4 pro">
                <a href="http://demo.indithemes.com/itng-plus" target="_blank" rel="external">
                    <img src="<?=esc_url( get_template_directory_uri() . '/assets/images/demos/4.jpeg'); ?>" alt="<?=__('IT News Grid Plus Demo', 'it-news-grid') ?>">
                </a>
                <figcaption>
                    <?=__('Classic', 'it-news-grid'); ?>
                </figcaption>
            </figure>

            <figure class="demo-5 pro">
                <a href="https://demo.indithemes.com/itng-plus-fashion" target="_blank" rel="external">
                    <img src="<?=esc_url( get_template_directory_uri() . '/assets/images/demos/5.jpeg'); ?>" alt="<?=__('IT News Grid Plus Demo', 'it-news-grid') ?>">
                </a>
                <figcaption>
                    <?=__('Fashion', 'it-news-grid'); ?>
                </figcaption>
            </figure>

            <figure class="demo-6 pro">
                <a href="https://demo.indithemes.com/itng-plus-travel" rel="external">
                    <img src="<?=esc_url( get_template_directory_uri() . '/assets/images/demos/6.jpeg'); ?>" alt="<?=__('IT News Grid Plus Demo', 'it-news-grid') ?>">
                </a>
                <figcaption>
                    <?=__('Travel', 'it-news-grid'); ?>
                </figcaption>
            </figure>
        </div>
        <h2><?php _e('Want to do your website a favour? Get IT News Grid Plus', 'it-news-grid'); ?></h2>
        <p><?php _e('The Plus version offers a multitude of features which could take your WordPress Blog to the next level!', 'it-news-grid') ?></p>
        <a class="itng-plus-btn button button-primary" href="https://indithemes.com/product/it-news-grid-plus/" target="_blank">
            <?=__('IT News Grid +', 'it-news-grid'); ?>
        </a>
        <br>
        <br>
        <p>
            <?php printf('For Support, Suggestions and Queries, please use the %s. <b>We are here for you!</b>', '<a href="https://indithemes.com/contact-us/" target="_blank" rel="help">form here</a>');
            ?>
        </p>
        <p>
            <?php printf('Using IT News Grid and loving it? Consider leaving it a %s review at %s. It really means a lot!', '<span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span>', '<a href="https://wordpress.org/themes/it-news-grid" rel="external" target="_blank">WordPress</a>');
            ?>
        </p>
    </div>
    <?php
}
