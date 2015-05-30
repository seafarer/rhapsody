<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package wrmc
 */

get_header(); ?>

<div id="primary" class="content-area" xmlns="http://www.w3.org/1999/html">
  <section id="resorts" class="hero">
    <?php
    $resorts = get_field('resorts_images');
    $resort_key = array_rand($resorts, 1);
    ?>
    <?php if( $resorts ) : ?>
    <style scoped>
      .hero-block.resorts {
        background-image: url('<?php echo $resorts[$resort_key]['sizes']['home_tny']; ?>');
      }
      @media (min-width: 481px) and (max-width: 767px) {
        .hero-block.resorts {
          background-image: url('<?php echo $resorts[$resort_key]['sizes']['home_small']; ?>');
        }
      }
      @media (min-width: 768px) and (max-width: 1024px) {
        .hero-block.resorts {
          background-image: url('<?php echo $resorts[$resort_key]['sizes']['home_med']; ?>');
        }
      }
      @media (min-width: 1025px) and (max-width: 1440px) {
        .hero-block.resorts {
          background-image: url('<?php echo $resorts[$resort_key]['sizes']['home_lrg']; ?>');
        }
      }
      @media (min-width: 1441px) {
        .hero-block.resorts {
          background-image: url('<?php echo $resorts[$resort_key]['sizes']['home_full']; ?>');
        }
      }
    </style>
    <?php endif; ?>
    <div class="hero-block resorts"></div>
    <div class="hero-title">
      <div class="hero-table">
        <p><span class="letter">R</span>Resorts</p>
      </div>
    </div>
  </section>

  <section id="mountains" class="hero">
    <?php
    $mountains = get_field('mountains_images');
    $mountains_key = array_rand($mountains, 1);
    ?>
    <?php if( $mountains ) : ?>
    <style scoped>
      .hero-block.mountains {
        background-image: url('<?php echo $mountains[$mountains_key]['sizes']['home_tny']; ?>');
      }
      @media (min-width: 481px) and (max-width: 767px) {
        .hero-block.mountains {
          background-image: url('<?php echo $mountains[$mountains_key]['sizes']['home_small']; ?>');
        }
      }
      @media (min-width: 768px) and (max-width: 1024px) {
        .hero-block.mountains {
          background-image: url('<?php echo $mountains[$mountains_key]['sizes']['home_med']; ?>');
        }
      }
      @media (min-width: 1025px) and (max-width: 1440px) {
        .hero-block.mountains {
          background-image: url('<?php echo $mountains[$mountains_key]['sizes']['home_lrg']; ?>');
        }
      }
      @media (min-width: 1441px) {
        .hero-block.mountains {
          background-image: url('<?php echo $mountains[$mountains_key]['sizes']['home_full']; ?>');
        }
      }
    </style>
    <?php endif; ?>
    <div class="hero-block mountains"></div>
    <div class="hero-title">
      <div class="hero-table">
        <p><span class="letter">M</span>Mountains</p>
      </div>
    </div>
  </section>

  <section id="cities" class="hero">
    <?php
    $cities = get_field('cities_images');
    $cities_key = array_rand($cities, 1);
    ?>
    <?php if( $cities ) : ?>
    <style scoped>
      .hero-block.cities {
        background-image: url('<?php echo $cities[$cities_key]['sizes']['home_tny']; ?>');
      }
      @media (min-width: 481px) and (max-width: 767px) {
        .hero-block.cities {
          background-image: url('<?php echo $cities[$cities_key]['sizes']['home_small']; ?>');
        }
      }
      @media (min-width: 768px) and (max-width: 1024px) {
        .hero-block.cities {
          background-image: url('<?php echo $cities[$cities_key]['sizes']['home_med']; ?>');
        }
      }
      @media (min-width: 1025px) and (max-width: 1440px) {
        .hero-block.cities {
          background-image: url('<?php echo $cities[$cities_key]['sizes']['home_lrg']; ?>');
        }
      }
      @media (min-width: 1441px) {
        .hero-block.cities {
          background-image: url('<?php echo $cities[$cities_key]['sizes']['home_full']; ?>');
        }
      }
    </style>
    <?php endif; ?>
    <div class="hero-block cities"></div>
    <div class="hero-title">
      <div class="hero-table">
        <p><span class="letter">C</span>Cities</p>
      </div>
    </div>
  </section>

  <section id="map">
    <?php $map = get_field('map_image');
      if( $map ) : ?>
      <img src="<?php print $map['sizes']['banner-image']; ?>">
    <?php endif; ?>

    <?php

    if( have_rows('destination') ): ?>

    <div class="places">
      <button id="places-menu">Our locations</button>
      <ul class="places-list">
      <?php while ( have_rows('destination') ) : the_row(); ?>
        <li>
          <a class="dest-link" href="<?php the_sub_field('destination_page_link'); ?>">
            <span class="destination-title"><?php the_sub_field('destination_line_1'); ?></span><br>
            <?php the_sub_field('destination_line_2'); ?>
          </a>
        </li>
      <?php endwhile; ?>
      </ul>
    </div>

    <?php else: endif; ?>

  </section>

  <section id="homepage-content">
    <main id="main" class="site-main" role="main">

      <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('content', 'page'); ?>

      <?php endwhile; // end of the loop. ?>

    </main>
  </section>

  <?php get_template_part('quote'); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
