<?php
/**
 * wrmc Theme Customizer
 *
 * @package wrmc
 */

/**
 * Add postMessage support for site title and description for the Theme
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wrmc_customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport         = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}

add_action('customize_register', 'wrmc_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes
 * asynchronously.
 */
function wrmc_customize_preview_js() {
  wp_enqueue_script('wrmc_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', TRUE);
}

add_action('customize_preview_init', 'wrmc_customize_preview_js');
