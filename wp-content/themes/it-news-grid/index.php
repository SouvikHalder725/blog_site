<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IT News Grid
 */

get_header();
?>
	<main id="primary" class="site-main <?php echo itng_sidebar_align('blog')[0]; ?>">

		<?php
		if ( get_theme_mod( 'itng_blog_title' ) ) {
		?>
			<p id="itng-content-title" class="blog-title container-fluid">
				<span>
					<?php
					echo esc_html( get_theme_mod('itng_blog_title', '') );
					?>
				</span>
			</p>
		<?php
		}

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				do_action( 'itng_layout', get_theme_mod('itng_blog_layout', get_theme_mod('itng_blog_layout', 'col_3') ) );

			endwhile;

			the_posts_pagination( apply_filters( 'itng_posts_pagination_args', array(
				'class'	=>	'itng-pagination',
				'prev_text'	=> '<i class="fa fa-angle-left"></i>',
				'next_text'	=> '<i class="fa fa-angle-right"></i>'
			) ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
do_action('itng_sidebar', 'blog');
get_footer();
