<?php
/**
 * Template part for displaying single posts.
 *
 * @package Evans Theatre 2015
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php evans_2015_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		$hero = 'large';
		if ( class_exists( 'Evans_Movie' ) && Evans_Movie::POST_TYPE === get_post_type() ) {
			$hero = Evans_Movie::POST_TYPE . '_hero';
		}
		if ( has_post_thumbnail() ) {
			echo '<div class="featured-image news post">';
			the_post_thumbnail( $hero );
			echo '</div> <!-- .featured-image .news .post -->' . PHP_EOL;
		}
		?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evans-2015' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php evans_2015_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

