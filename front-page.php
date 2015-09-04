<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package rhapsody
 */

get_header(); ?>

<?php $images = get_field('slideshow_images');

if ($images): ?>

  <div class="hero">
    <ul id="hero-slider">
      <?php foreach ($images as $image): ?>
        <li>
          <img src="<?php echo $image['sizes']['hero']; ?>" alt="<?php echo $image['alt']; ?>"/>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

	</div><!-- #primary -->
  <div id="secondary" class="sidebar">

    <div class="block-3 block">
      <h2>WOD!</h2>

      <?php
      $args = array('numberposts' => '3');
      $recent_posts = wp_get_recent_posts($args);
      foreach ($recent_posts as $recent) {
        echo '<h3><a href="' . get_permalink($recent["ID"]) . '" title="Look ' . esc_attr($recent["post_title"]) . '" >' . $recent["post_title"] . '</a> </h3>';
        echo '<div class="entry-meta">'. rhapsody_posted_on() .'</div>';
      }
      ?>
    </div>
  </div>

<?php get_footer(); ?>
