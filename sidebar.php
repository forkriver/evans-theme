<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Evans Theatre 2015
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="row">
<div id="secondary" class="widget-area center twelve columns" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary .center twelve columns -->
</div><!-- .row -->
