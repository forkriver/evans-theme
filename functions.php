<?php
/**
 * Evans Theatre 2015 functions and definitions
 *
 * @package Evans Theatre 2015
 */

if ( ! function_exists( 'evans_2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function evans_2015_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Evans Theatre 2015, use a find and replace
	 * to change 'evans-2015' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'evans-2015', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'evans-2015' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'evans_2015_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // evans_2015_setup
add_action( 'after_setup_theme', 'evans_2015_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function evans_2015_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'evans_2015_content_width', 640 );
}
add_action( 'after_setup_theme', 'evans_2015_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function evans_2015_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'evans-2015' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Front Page Sidebar', 'evans-2015' ),
		'id'			=> 'sidebar-front-page',
		'description'	=> '',
		'before_widget' => '<aside id="%1$s" class="widget front-page %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title front-page">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'evans_2015_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function evans_2015_scripts() {
	// google fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic|Open+Sans|Quicksand|Josefin+Sans:700' );
	
	// stylesheet
	wp_enqueue_style( 'evans-2015-style', get_stylesheet_uri() );

	wp_enqueue_script( 'evans-2015-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'evans-2015-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'evans_2015_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load the Theme Hook Alliance code.
 */
require_once( get_template_directory() . '/inc/tha-theme-hooks.php' );

add_action( 'movie_meta', 'spit_out_showtimes_yo' );
function spit_out_showtimes_yo() {
	if( ! class_exists( 'Evans_Movie' ) ) {
		if( current_user_can( 'update_core' ) ) {
			echo( "<p><strong>Note:</strong> You need to turn on the Evans Movie CPT plugin.</p>" );
		}
		return false;
	}
	global $post;
	$showtimes = get_post_meta( $post->ID, Evans_Movie::PREFIX . 'showtime' );
	if( $showtimes ) {
		$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );
		sort( $showtimes );
		echo( '<div class="single-movie showtimes centered">' );
		foreach( $showtimes as $showtime ) {
			echo( date( $format, $showtime ) );
			if( $showtime !== end( $showtimes ) ) {
				echo( ' | ' );
			}
		}
		echo( '</div><!-- .single-movie showtimes -->' . PHP_EOL );
	}
	
}

function pj_ab_testing() {
	if( wp_is_mobile() ) {
		// don't mess with the mobile crowd
		return;
	}
	$random = wp_rand( 1, 1000 );
	if( 0 === $random % 2 ) {
		// on the even draws, swap out the stylesheet to B
		wp_deregister_style( 'evans-2015-style' );
		wp_register_style( 'evans-2015-style', get_stylesheet_directory_uri() . '/style-b.css' );
	}
}
// add_action( 'init', 'pj_ab_testing', 1 );