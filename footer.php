<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rhapsody
 */

?>

	</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-footer__inner">
		<h3>Quick Links</h3>
		<nav class="footer-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu__list', 'container' => '' ) ); ?>
		</nav>
		<div class="footer-social">
			<h3 class="">Stay connected</h3>
			<ul class="footer-social__list">
				<?php if ( get_theme_mod( 'rhapsody_facebook' ) ) : ?>
					<li class="footer-social__item facebook">
						<a href="<?php echo get_theme_mod( 'rhapsody_facebook' ); ?>" target="_blank">Facebook</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'rhapsody_instagram' ) ) : ?>
					<li class="footer-social__item instagram">
						<a href="<?php echo get_theme_mod( 'rhapsody_instagram' ); ?>" target="_blank">Instagram</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'rhapsody_pinterest' ) ) : ?>
					<li class="footer-social__item pinterest">
						<a href="<?php echo get_theme_mod( 'rhapsody_pinterest' ); ?>" target="_blank">Pinterest</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'rhapsody_twitter' ) ) : ?>
					<li class="footer-social__item twitter">
						<a href="<?php echo get_theme_mod( 'rhapsody_twitter' ); ?>" target="_blank">Twitter</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="footer-contact">
			<img class="branding__logo" src="<?php bloginfo('template_url'); ?>/assets/images/rhapsody-logo.svg" alt="logo" onerror="this.onerror=null; this.src='<?php bloginfo('template_url'); ?>/assets/images/rhapsody-logo.png'">
			<div itemscope itemtype="http://schema.org/LocalBusiness">
				<h1><div itemprop="name"><?php bloginfo('name'); ?></div></h1>
				<div itemprop="description"><?php bloginfo('description'); ?></div>
				<?php if ( get_theme_mod( 'rhapsody_phone' ) ) : ?>
					<div itemprop="telephone"><?php echo get_theme_mod( 'rhapsody_phone' ); ?></div>
				<?php endif; ?>
				<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					<?php if ( get_theme_mod( 'rhapsody_address' ) ) : ?>
						<div itemprop="streetAddress"><?php echo get_theme_mod( 'rhapsody_address' ); ?></div>
					<?php endif; ?>
					<div>
						<?php if ( get_theme_mod( 'rhapsody_city' ) ) : ?>
							<span itemprop="addressLocality"><?php echo get_theme_mod( 'rhapsody_city' ); ?></span>,
						<?php endif; ?>
						<?php if ( get_theme_mod( 'rhapsody_state' ) ) : ?>
							<span itemprop="addressRegion"><?php echo get_theme_mod( 'rhapsody_state' ); ?></span>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'rhapsody_zip' ) ) : ?>
							<span itemprop="postalCode"><?php echo get_theme_mod( 'rhapsody_zip' ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="site-info">
		<div class="copyright">
			&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #inner page -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
