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
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/favicon-180.png">
  <meta name="msapplication-TileColor" content="#1a1a1a">
  <meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/images/favicon-144.png">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <div class="inner-page">

    <div class="mobile-header">
      <a class="mobile-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
        <img src="<?php bloginfo('template_url'); ?>/images/rmc-logo.svg" width="100" onerror="this.onerror=null; this.src='<?php bloginfo('template_url'); ?>/images/rmc-logo.png'">
      </a>
      <a class="menu-btn" id="nav-open-btn" href="#top"><span class="icon-menu"></span></a>
    </div>

    <?php if(is_front_page()) : ?>
    <section id="hero-video" class="hero-video hero hero-current">
      <?php if (!wp_is_mobile() && (get_field('webm_video') || get_field('mp4_video'))) { ?>
        <video width='100%' id='rhapsody-video' autoplay loop autobuffer preload='auto' poster='data:image/gif,AAAA'>
          <?php if(get_field('webm_video')) : ?>
            <source src='<?php the_field('webm_video');  ?>' type='video/webm'>
          <?php endif; ?>
          <?php if(get_field('mp4_video')) : ?>
            <source src='<?php the_field('mp4_video');  ?>' type='video/mp4'>
          <?php endif; ?>
        </video>
      <?php } else { ?>
        <div class='mobile-splash'></div>
      <?php } // End mobile ?>
    </section>
    <?php endif; ?>

    <header id="masthead" class="site-header" role="banner">
      <div class="header-row">
        <div class="site-branding">
          <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
              <?php bloginfo('name'); ?>
            </a>
          </h1>
        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <?php wp_nav_menu(array('theme_location'  => 'primary',
                                  'container_class' => 'main-menu',
          )); ?>
        </nav>
        <a class="menu-btn" id="nav-close-btn" href="#top"><span class="icon-cancel"></span></a>
      </div>
    </header>



    <div id="content" class="site-content">
