<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Evans Theatre 2015
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'evans-2015' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<div class="row">
	<div class="four columns site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('description' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .four columns .site-branding -->

		<div class="eight columns right">
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
	</header><!-- #masthead -->

	<div id="content" class="container site-content">
