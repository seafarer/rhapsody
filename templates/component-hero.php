<?php
/**
 * The template for a hero gallery
 *
 * @package rhapsody
 */

$images = get_field('slideshow_images'); ?>

<?php if ($images): ?>
  <div class="hero">
    <ul id="hero-slider">
      <?php foreach ($images as $image): ?>
        <li>
          <img src="<?php echo $image['sizes']['banner_full']; ?>" alt="<?php echo $image['alt']; ?>"/>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
