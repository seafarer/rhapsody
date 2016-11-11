<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package rhapsody
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="page">
  <div class="page__inner">

    <nav class="primary-menu">
      <div class="primary-menu__inner">
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rhapsody' ); ?></a>
        <button class="nav-btn nav-btn__close"><span class="icon-times-circle"></span></button>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'primary-menu__list', 'container' => '' ) ); ?>
      </div>
    </nav>

    <header class="branding">
      <div class="branding__inner">
        <button class="nav-btn nav-btn__open"><span class="icon-bars"></span></button>
        <a href="/"><img class="branding__logo" src="<?php bloginfo('template_url'); ?>/assets/images/logo.svg" alt="logo" onerror="this.onerror=null; this.src='<?php bloginfo('template_url'); ?>/assets/images/logo.png'"></a>
        <h1 class="branding__title"><?php bloginfo( 'Name' ); ?></h1>
        <h2 class="branding__description"><?php bloginfo( 'description' ); ?></h2>
      </div>
    </header>
