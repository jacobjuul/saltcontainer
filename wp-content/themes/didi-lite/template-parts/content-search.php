<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Didi Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="clear">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'didi-lite-post-list-thumbnail' ); ?>
			</a>
		</div>
		<?php } ?>

		<?php if( ! get_theme_mod( 'didi_lite_post_footer' ) ) : ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php didi_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	</div><!-- .clear -->
</article><!-- #post-## -->