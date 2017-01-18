<?php
/**
 * The template for displaying the home page.
 *
 * @package Evans Theatre 2015
 */

get_header( 'front-page' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php do_action( 'evans_front_page_news' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'front-page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
