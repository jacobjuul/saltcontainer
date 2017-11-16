<?php
/**
 * Template part for displaying single posts.
 *
 * @package Didi Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'didi-lite-post-thumbnail' ); ?>
			</a>
		</div>
		<?php } ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if( ! get_theme_mod( 'didi_lite_post_footer' ) ) : ?>
		<div class="entry-meta">
			<?php didi_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'didi-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if( ! get_theme_mod( 'didi_lite_post_footer' ) ) : ?>
	<footer class="entry-footer">
		<?php didi_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>

	<?php if( ! get_theme_mod( 'didi_lite_author_bio' ) ) : ?>
	<?php get_template_part( 'author-bio' );?>
	<?php endif; ?>
</article><!-- #post-## -->