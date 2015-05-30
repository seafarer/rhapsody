<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wrmc
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="row">
        <div class="site-info">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php bloginfo('name'); ?>
          </a>
        </div>
        <div class="social-links">
          <ul class="inline">
            <li><a class="facebook" href="https://www.facebook.com/RMCYourDestinationConnection" target="_blank"><span class="icon-facebook"></span>Facebook</a></li>
            <li><a class="twitter" href="https://twitter.com/Rockymtncon" target="_blank"><span class="icon-twitter"></span>Twitter</a></li>
          </ul>
        </div>

        <div class="footer-nav">
          <?php wp_nav_menu(array('theme_location'  => 'footer',
                                  'container' => 'false',
          )); ?>
        </div>
        <div class="copyright">&copy; <?php print the_date('Y'); ?></div>
      </div>
    </footer><!-- #colophon -->
  </div><!-- .inner-page -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
