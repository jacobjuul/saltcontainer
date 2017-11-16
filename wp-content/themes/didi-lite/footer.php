<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Didi Lite
 */

?>
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>

		<div class="site-footer" role="complementary">
			<div class="footer-widgets clear">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="widget-area">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div><!-- .widget-area -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="widget-area">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div><!-- .widget-area -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="widget-area">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div><!-- .widget-area -->
				<?php endif; ?>
			</div><!-- .footer-widgets -->
		</div><!-- .site-footer -->
		<?php endif; ?>
		<footer id="colophon" class="site-info" role="contentinfo">
			<a href="http://www.anarieldesign.com/free-fashion-wordpress-theme/"><?php printf( esc_html__( 'Theme: %1$s.', 'didi-lite' ), 'Didi Lite designed by Anariel Design. Copyright 2015-2016 Anariel Design' ); ?></a>
		</footer><!-- .site-info -->
	</div><!-- .page -->
</div><!-- .footer -->
<?php wp_footer(); ?>
</body>
</html>