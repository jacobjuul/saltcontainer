<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Myth
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<span class="generator"><?php echo esc_html__( 'Powered by ', 'myth' ) ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'myth' ) ); ?>" rel="generator">WordPress</a></span>
			<span class="sep"> | </span>
			<span class="designer"><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'myth' ), '<a href="https://michaelvandenberg.com/themes/#myth" rel="theme">Myth</a>', 'Michael Van Den Berg' ); ?></span>
		</div><!-- .site-info -->

		<div class="social-bottom">
			<?php if ( has_nav_menu( 'social' ) ) { get_template_part( 'template-parts/navigation-social' ); } ?>
		</div><!-- .social-bottom -->
	</footer><!-- #colophon -->

	<a href="#content" class="back-to-top"><?php esc_html__( 'Top', 'myth' ); ?></a>

	<?php if ( has_nav_menu( 'social' ) ) { ?>
		<div class="social-right" role="navigation">
			<?php get_template_part( 'template-parts/navigation-social' ); ?>
		</div><!-- .social-top -->
	<?php } ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
