<?php
/**
 * Template for banner sliders
 */

  $images = get_field('banner_image');
  $count = count($images);

  if ( $images && $count === 1 ) { ?>

    <img src="<?php echo $images['0']['sizes']['banner-image']; ?>" alt="<?php echo $images['0']['alt']; ?>" />
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

  <?php } elseif ( $count > 1 ) { ?>

    <div class="banner-slider">
      <?php  foreach( $images as $image ): ?>
        <div class="banner-slide">
          <img src="<?php echo $image['sizes']['banner-image']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>
      <?php endforeach; ?>
    </div>
    <div class="banner-nav"></div>

    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

  <?php } else { ?>

    <?php the_title('<h1 class="entry-title no-images">', '</h1>'); ?>

  <?php }
