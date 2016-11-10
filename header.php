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
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <div id="inner-page">

    <div class="navigation-bar">
      <nav id="site-navigation" class="main-navigation" role="navigation">
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rhapsody' ); ?></a>
        <button class="nav-btn" id="nav-close"><span class="icon-times-circle"></span></button>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'main-menu', ) ); ?>
      </nav><!-- #site-navigation -->
    </div>

    <div class="site-header row">

      <header id="masthead" role="banner">
        <div class="site-branding">
          <button class="nav-btn" id="nav-open"><span class="icon-bars"></span></button>
          <a href="/"><img class="site-logo" src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="logo"  onerror="this.onerror=null; this.src='<?php bloginfo('template_url'); ?>/images/logo.png'"></a>
          <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>
      </header><!-- #masthead -->

    </div>

    <div id="content" class="site-content row">
