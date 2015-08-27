<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Evans Theatre 2015
 */

?>
	<?php tha_content_bottom(); ?>
	</div><!-- #content -->
	<?php tha_content_after(); ?>

	<?php tha_footer_before(); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php tha_footer_top(); ?>
	<div class="row">
	<div class="twelve columns center">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php
				$args = array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth' => 1,
				); 
			?>
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'evans-2015' ); ?></button> -->
			<?php
				wp_nav_menu( $args ); 
			?>
		</nav><!-- #site-navigation -->
		</div><!-- .twelve columns center -->
		</div><!-- .row -->

	<?php tha_footer_bottom(); ?>	
	</footer><!-- #colophon -->
	<?php tha_footer_after(); ?>
</div><!-- #page -->

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>

</body>
</html>
