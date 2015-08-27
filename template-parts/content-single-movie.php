<?php
/**
 * Template part for displaying single posts.
 *
 * @package Evans Theatre 2015
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="movie">

<?php
	$hero = 'large';
	if( class_exists( 'Evans_Movie' ) && Evans_Movie::POST_TYPE === get_post_type() ) {
		$hero = Evans_Movie::POST_TYPE . '_hero';
	}
	if( has_post_thumbnail() ) {
		the_post_thumbnail( $hero );
	}
?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title movie-title center">', '</h1>' ); ?>

		<div class="entry-meta">
		<?php do_action( 'movie_meta' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evans-2015' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	</div> <!-- .movie -->

	<footer class="entry-footer">
		<?php evans_2015_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

