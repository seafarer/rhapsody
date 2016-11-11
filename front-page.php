<?php
/**
 * The template for displaying the home page.
 *
 * @package rhapsody
 */

get_header(); ?>

<?php // get_template_part( 'templates/compononent', 'hero' ); ?>

<div id="content" class="content">
  <main id="primary" class="primary">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'templates/content', 'page' ); ?>

    <?php endwhile; // End of the loop. ?>

  </main><!-- #main -->

<?php get_footer(); ?>
