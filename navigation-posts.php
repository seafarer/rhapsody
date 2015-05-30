
<nav class="navigation post-navigation" role="navigation">
  <div class="nav-links">
    <?php previous_post_link_plus(
      array(
        'order_by' => 'post_name',
        'loop' => true,
        'format' => '%link',
        'before' => '<div class="nav-previous">',
        'after' => '</div>',
      )
    ); ?>

    <?php next_post_link_plus(
      array(
        'order_by' => 'post_name',
        'loop' => true,
        'format' => '%link',
        'before' => '<div class="nav-next">',
        'after' => '</div>',
      )
    ); ?>
  </div>
</nav>