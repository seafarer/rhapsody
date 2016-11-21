<?php
/**
 * Add Options to the Customizer
 *
 * @rhapsody
 */

/**
 * Create Logo Setting and Upload Control
 */
function rhapsody_customizer_settings($wp_customize) {

  // Add Contact Section
  $wp_customize->add_section('rhapsody_contact', [
    'title' => __('Contact Info'),
    'description' => __('Settings for address and phone'),
    'priority' => 25,
  ]);

  // Add Social Section
  $wp_customize->add_section('rhapsody_social', [
    'title' => __('Social Networks'),
    'description' => __('Add links to your social media profiles'),
    'priority' => 30
  ]);

  // Contact settings
  $wp_customize->add_setting('rhapsody_phone');
  $wp_customize->add_setting('rhapsody_address');
  $wp_customize->add_setting('rhapsody_city');
  $wp_customize->add_setting('rhapsody_state');
  $wp_customize->add_setting('rhapsody_zip');

  // Contact controls
  $wp_customize->add_control('rhapsody_phone',  [
    'label' => __( 'Primary Phone Number'),
    'section' => 'rhapsody_contact',
    'type' => 'tel',
    'priority' => 10
  ]);

  $wp_customize->add_control('rhapsody_address', [
    'label' => __( 'Street Address'),
    'section' => 'rhapsody_contact',
    'type' => 'text',
    'priority' => 15
  ]);

  $wp_customize->add_control('rhapsody_city', [
    'label' => __( 'City'),
    'section' => 'rhapsody_contact',
    'type' => 'text',
    'priority' => 20,
  ]);

  $wp_customize->add_control('rhapsody_state', [
    'label' => __( 'State'),
    'section' => 'rhapsody_contact',
    'type' => 'text',
    'priority' => 20,
  ]);

  $wp_customize->add_control('rhapsody_zip', [
    'label' => __( 'Zip Code'),
    'section' => 'rhapsody_contact',
    'type' => 'text',
    'priority' => 20,
  ]);

  // Social settings
  $wp_customize->add_setting('rhapsody_facebook');
  $wp_customize->add_setting('rhapsody_instagram');
  $wp_customize->add_setting('rhapsody_twitter');
  $wp_customize->add_setting('rhapsody_pinterest');

  // Social controls;
  $wp_customize->add_control('rhapsody_facebook', [
    'label' => __( 'Facbook URL' ),
    'section' => 'rhapsody_social',
    'type' => 'url',
    'input_attrs' => array(
      'placeholder' => __( 'https://facebook.com/your_page' ),
    ),
  ]);

  $wp_customize->add_control('rhapsody_instagram', [
    'label' => __( 'Instagram URL' ),
    'section' => 'rhapsody_social',
    'type' => 'url',
    'input_attrs' => array(
      'placeholder' => __( 'https://instagram.com/your_page' ),
    ),
  ]);

  $wp_customize->add_control('rhapsody_twitter', [
    'label' => __( 'Twitter URL' ),
    'section' => 'rhapsody_social',
    'type' => 'url',
    'input_attrs' => array(
      'placeholder' => __( 'https://twitter.com/your_page' ),
    ),
  ]);

  $wp_customize->add_control('rhapsody_pinterest', [
    'label' => __( 'Pinterest URL' ),
    'section' => 'rhapsody_social',
    'type' => 'url',
    'input_attrs' => array(
      'placeholder' => __( 'https://pinterest.com/your_page' ),
    ),
  ]);

}
add_action('customize_register', 'rhapsody_customizer_settings');
