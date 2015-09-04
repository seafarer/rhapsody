<?php
/**
 * rhapsody functions and definitions
 *
 * @package rhapsody
 */

if ( ! function_exists( 'rhapsody_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rhapsody_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rhapsody, use a find and replace
	 * to change 'rhapsody' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rhapsody', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'rhapsody' ),
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
}
endif; // rhapsody_setup
add_action( 'after_setup_theme', 'rhapsody_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rhapsody_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rhapsody' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'rhapsody_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rhapsody_scripts() {
	wp_enqueue_style( 'rhapsody-style', get_stylesheet_uri() );

  if (!is_admin()) add_action("wp_enqueue_scripts", "wrmc_jquery_enqueue", 11);
  function wrmc_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
  }

  wp_enqueue_script( 'rhapsody-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.custom.js',array(), '2.7.2', false);
  wp_enqueue_script( 'rhapsody-classie', get_template_directory_uri() . '/js/vendor/classie.js', array(), '1.0.1', true );
	wp_enqueue_script( 'rhapsody-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '0.0.1', true );
  wp_enqueue_script( 'rhapsody-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
  wp_enqueue_script( 'rhapsody-slippry', get_template_directory_uri() . '/js/vendor/slippry.min.js', array(), '1.2.1', true );
  wp_enqueue_script( 'rhapsody-app', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );


  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rhapsody_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
