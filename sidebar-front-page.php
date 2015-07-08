<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Evans Theatre 2015
 */

if ( ! is_active_sidebar( 'sidebar-front-page' ) ) {
	return;
}
?>

<div class="row">
	<div id="secondary" class="twelve columns widget-area centered" role="complementary">
		<?php dynamic_sidebar( 'sidebar-front-page' ); ?>
	</div><!-- #secondary .twelve-columns widget-area -->
</div><!-- .row -->
