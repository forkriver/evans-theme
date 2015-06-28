<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Evans Theatre 2015
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function evans_2015_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'evans_2015_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function evans_2015_jetpack_setup
add_action( 'after_setup_theme', 'evans_2015_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function evans_2015_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function evans_2015_infinite_scroll_render
