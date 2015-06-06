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

    <div class="site-header row">

      <button class="nav-button" id="nav-open"><span class="icon-list2"></span> Menu</button>

      <header id="masthead" role="banner">
        <div class="site-branding">
          <img class="site-logo" src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="logo" width="150" onerror="this.onerror=null; this.src='<?php bloginfo('template_url'); ?>/images/logo.png'">
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>
      </header><!-- #masthead -->

      <nav id="site-navigation" class="main-navigation" role="navigation">
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ecstatic' ); ?></a>
        <button class="nav-btn" id="nav-close"><span class="icon-cross3"></span> Close</button>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu', ) ); ?>
      </nav><!-- #site-navigation -->

    </div>

    <div id="content" class="site-content row">
