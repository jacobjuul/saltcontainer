<?php
/**
 * Template part for displaying posts
 *
 * @package Colorskin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('colorskin-large-thumb'); ?></a>
		</div>
	<?php endif; ?>
    
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta cf">
                <?php colorskin_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
        
	</header><!-- .entry-header -->
    
	<div class="entry-content">
        
        <?php if ( (get_theme_mod('colorskin_full_content', 'excerpt') != 'full_content' ) && !is_single() ) : ?>
            <?php the_excerpt(); ?>
            <span class="read-more-link"><a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'colorskin' ); ?></a></span>
		<?php else : ?>
            <?php the_content(); ?>
		<?php endif; ?>
        
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'colorskin' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
    <?php colorskin_entry_footer(); ?>
    
</article><!-- #post-## -->