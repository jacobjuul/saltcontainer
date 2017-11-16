<?php
/**
 * The template part for displaying results in search pages
 *
 * @package Colorskin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta cf">
                <?php colorskin_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
        
	</header><!-- .entry-header -->
    
	<div class="entry-content">
        <?php the_excerpt(); ?>
        
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'colorskin' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
    <?php colorskin_entry_footer(); ?>
    
</article><!-- #post-## -->