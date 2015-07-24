<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Evans Theatre 2015
 */
tha_html_before();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php tha_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php tha_head_bottom(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'evans-2015' ); ?></a>
	<?php tha_header_before(); ?>
	<header id="masthead" class="site-header" role="banner">
	<?php tha_header_top(); ?>
	<div class="row">
	<div class="four columns site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('description' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .four columns .site-branding -->

		<div class="eight columns right"><?php tha_header_before(); ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'evans-2015' ); ?></button>
			<?php
				$args = array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'depth' => 1,
					); 
				wp_nav_menu( $args ); 
			?>
		</nav><!-- #site-navigation -->
		</div><!-- .eight columns right -->
		</div> <!-- .row -->
	<?php tha_header_bottom(); ?>
	</header><!-- #masthead -->
	<?php tha_header_after(); ?>

	<?php tha_content_before(); ?>
	<div id="content" class="container site-content">
	<?php tha_content_top(); ?>
