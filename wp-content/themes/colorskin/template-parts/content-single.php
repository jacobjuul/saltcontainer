<?php
/**
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
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta cf">
                <?php colorskin_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
        
	</header><!-- .entry-header -->
    
	<div class="entry-content">
        <?php the_content(); ?>
        
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'colorskin' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
    <?php colorskin_entry_footer(); ?>
    
</article><!-- #post-## -->