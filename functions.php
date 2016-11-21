<?php
/**
 * rhapsody functions and definitions
 *
 * @package rhapsody
 */

if ( ! function_exists( 'rhapsody_setup' ) ) :
	function rhapsody_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rhapsody, use a find and replace
		 * to change 'rhapsody' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'rhapsody', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'rhapsody' ),
			'footer' => esc_html__( 'Footer Menu', 'aew' )
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
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

  wp_enqueue_script( 'rhapsody-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js',array(), '3.3.1', false);
  wp_enqueue_script( 'rhapsody-app', get_template_directory_uri() . '/assets/js/all.js', array(), '1.0.0', true );

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
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer customizations
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
