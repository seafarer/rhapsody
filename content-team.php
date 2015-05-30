<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wrmc
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <a href="<?php the_permalink(); ?>">

    <?php if ( has_post_thumbnail() ) : ?>
      <div class="grid-image">
        <?php the_post_thumbnail('landing-grid'); ?>
      </div>
    <?php endif; ?>

    <header class="entry-header">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
      <?php if(get_field('main_office')) : ?>
        <h3><?php the_field('main_office'); ?></h3>
      <?php endif; ?>
    </header>
  </a>

</article>
