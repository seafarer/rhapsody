<?php
/**
 * The template for displaying a grid of featured items.
 *
 * @package rhapsody
 */

$ids = get_field('featured_item', false, false);


$featured = new WP_Query(array(
  'post_type'      	=> 'rmc_featured',
  'posts_per_page'	=> -1,
  'post__in'		    => $ids,
  'post_status'		  => 'published',
  'orderby'         => 'title',
  'order'        	  => 'ASC',
));

if ($featured->have_posts() && $ids) { ?>
  <div class="featured-grid">
    <?php while ($featured->have_posts()) {
      $featured->the_post(); ?>

      <div class="featured-item">

        <a href="<?php the_permalink(); ?>">

          <?php if ( has_post_thumbnail() ) : ?>
            <div class="grid-image">
              <?php the_post_thumbnail('featured-grid'); ?>
            </div>
          <?php endif; ?>

          <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
          </header>
        </a>

      </div>

    <?php } ?>
  </div>
<?php } else { }

wp_reset_postdata();
