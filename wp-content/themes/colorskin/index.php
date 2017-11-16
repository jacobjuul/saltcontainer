<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Colorskin
 */
get_header(); ?>

<header class="page-header cf">
    <div class="container">
        <h1 class="page-title"><?php echo get_the_title(get_option( 'page_for_posts' )); ?></h1>
    </div>
</header><!-- .page-header -->
    
<div class="container">
    <div class="row">
        
        <div id="primary" class="content-area col-md-9">
            <main id="main" class="site-main cf" role="main">
            
            <?php if ( have_posts() ) : ?>
                
                <?php /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>
                    
                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_format() );
                    ?>
                    
                <?php endwhile; ?>
                
                <?php get_template_part( 'navigation', 'none' ); ?>
                
            <?php else : ?>
                
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
                
            <?php endif; ?>
            
            </main><!-- #main -->
        </div><!-- #primary -->
        
        <?php get_sidebar(); ?>
        
    <?php get_footer(); ?>