<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Colorskin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail('colorskin-large-thumb'); ?>
		</div>
	<?php endif; ?>
    
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
    
    <?php edit_post_link( __( 'Edit', 'colorskin' ), '<span class="edit-link"><i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?>
    
</article><!-- #post-## -->